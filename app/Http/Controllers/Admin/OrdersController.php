<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\City;
use App\Deliverycompany;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Item;
use App\Order;
use App\Paymenttype;
use App\Zone;
use Faker\Provider\ar_SA\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class OrdersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 10;
        $citys = City::all();
        if (!empty($keyword)) {
            $orders = Order::where('date', 'LIKE', "%$keyword%")
                ->orWhere('month', 'LIKE', "%$keyword%")
                ->orWhere('deliverycompany_id', 'LIKE', "%$keyword%")
                ->orWhere('shipment_code', 'LIKE', "%$keyword%")
                ->orWhere('name', 'LIKE', "%$keyword%")
                ->orWhere('order_source', 'LIKE', "%$keyword%")
                ->orWhere('item_id', 'LIKE', "%$keyword%")
                ->orWhere('quantity', 'LIKE', "%$keyword%")
                ->orWhere('price', 'LIKE', "%$keyword%")
                ->orWhere('Location_address', 'LIKE', "%$keyword%")
                ->orWhere('zone_id', 'LIKE', "%$keyword%")
                ->orWhere('telephone', 'LIKE', "%$keyword%")
                ->orWhere('notes', 'LIKE', "%$keyword%")
                ->orWhere('delivery_process', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $orders = Order::latest()->paginate($perPage);
        }

        return view('admin.orders.index', compact('orders', 'citys'));
    }


    public function create()
    {
        //$items =Item::all();
        $zones = Zone::all();
        $deliverycompanys = Deliverycompany::all();

        //get category for page
        $categorys = DB::table('categorys')
            ->groupBy('id')
            ->get();

        return view('admin.orders.create', compact('zones', 'categorys', 'deliverycompanys'));
    }

    // public function store(Request $request)
    // {


    //     $requestData = $request->all();
    //     $order = Order::create($requestData);
    //     $price = $order->price;
    //     $first_payment = $order->first_payment;
    //     $id = $order->id;

    //     $item = DB::table('items')->where('id', $order->item_id)->first();
    //     $item_quantity = $item->quantity;
    //     $item_price = $item->selling_price;

    //     //get total price in order table
    //     $order_price = DB::table('orders')->where('id', $id)->first();
    //     $order_quantity = $order->quantity;


    //     if ($order->delivery_process == 'Dispatch') {
    //         $dispatchQuantity = $order->quantity;
    //         $item = DB::table('items')->where('id', $order->item_id)->first();
    //         $item_quantity = $item->quantity;
    //         DB::table('items')->update(['quantity' => ($item_quantity - $dispatchQuantity)]);
    //     } else if ($order->delivery_process == 'Return') {
    //         $returnQuantity = $order->quantity;
    //         $item = DB::table('items')->where('id', $order->item_id)->first();
    //         $item_quantity = $item->quantity;
    //         DB::table('items')->update(['quantity' => ($item_quantity + $returnQuantity)]);
    //     } else if ($order->delivery_process == 'Pickup') {
    //         $pickupQuantity = $order->quantity;
    //         $item = DB::table('items')->where('id', $order->item_id)->first();
    //         $item_quantity = $item->quantity;
    //         DB::table('items')->update(['quantity' => ($item_quantity - $pickupQuantity)]);
    //     }



    //     $paymentType = new Paymenttype();
    //     $paymentType->order_id = $order->id;
    //     $paymentType->name = $order->name;
    //     $paymentType->deposit_type = $order->deposit_type;
    //     $paymentType->amount = $order->first_payment;
    //     $paymentType->pay_to_future = (($item_price * $order_quantity) - $first_payment);

    //     $paymentType->save();
    //     return redirect('orders');
    // }


    public function show($id)
    {
        $order = Order::findOrFail($id);
        $cartItems =  json_decode($order->cart_items);
        foreach ($cartItems as $item) {
            $items = Item::findOrFail($item->item_id);
            $item->{"item_name"} = $items->name;
        }
        $items = Item::all();
        return view('admin.orders.show', compact('order', 'items', 'cartItems'));
    }

    public function fetchCartItems(Request $request)
    {
        $order = Order::findOrFail($request->get('id'));
        $cartItems =  json_decode($order->cart_items);
        $cartShow =  json_decode($order->cart_items);
        foreach ($cartShow as $item) {
            $items = Item::findOrFail($item->item_id);
            $category = Category::findOrFail($item->category_id);
            $item->{"item_id"} = $items->name;
            $item->{"category_id"} = $category->name;
        }
        $data = array($cartShow, $cartItems);
        return $data;
    }


    public function edit($id)
    {
        $order = Order::findOrFail($id);
        //$items =Item::all();
        $zones = Zone::all();
        $categorys = Category::all();
        $deliverycompanys = Deliverycompany::all();
        return view('admin.orders.edit', compact('order', 'zones', 'categorys', 'deliverycompanys'));
    }


    public function update(Request $request, $id)
    {

        $requestData = $request->all();

        $order = Order::findOrFail($id);
        $item = DB::table('items')->where('id', $order->item_id)->first();
        $item_quantity = $item->quantity;
        $item_price = $item->selling_price;
        $order_price = $order->price;

        if ($item->quantity >= 0) {
            if ($order->delivery_process == 'Dispatch') {
                $dispatchQuantity = $order->quantity;
                DB::table('items')->update(['quantity' => ($item_quantity - $dispatchQuantity)]);
            } else if ($order->delivery_process == 'Return') {
                $returnQuantity = $order->quantity;
                $item = DB::table('items')->where('id', $order->item_id)->first();
                DB::table('items')->update(['quantity' => ($item_quantity - $returnQuantity)]);
            } else if ($order->delivery_process == 'Pickup') {
                $pickupQuantity = $order->quantity;
                $item = DB::table('items')->where('id', $order->item_id)->first();
                DB::table('items')->update(['quantity' => ($item_quantity + $pickupQuantity)]);
            }
        }
        //Get zone price
        $item__price = DB::table('items')->where('id', $order->item_id)->first();
        $zone_price = $item->price;

        // $price=$item_price*$order_quantity;
        DB::table('orders')->update(['price' => ($order_price + $zone_price)]);




        $order->update($requestData);

        return redirect('orders')->with('flash_message', 'Order updated!');
    }


    public function destroy($id)
    {
        Order::destroy($id);

        return redirect('orders')->with('flash_message', 'Order deleted!');
    }

    //for shopping cart
    public function getDataAjax(Request $request)
    {
        return response()->json(array('msg' => $request->arraydata), 200);
    }

    function fetchData(Request $request)
    {
        $select = $request->get('select');
        $value = $request->get('value');
        $dependent = $request->get('dependent');
        $data = DB::table('items')
            ->where('category_id', $value)
            ->get();

        $output = '<option value="">Select ' . ucfirst($dependent) . '</option>';
        foreach ($data as $row) {
            $output .= '<option value="' . $row->id . '">' . $row->name . '</option>';
        }
        return $output;
    }

    function fetchPrice(Request $request)
    {
        $select = $request->get('select');
        $value = $request->get('value');
        $dependent = $request->get('dependent');
        $data = DB::table('items')
            ->where('id', $value)
            ->first();

        return $data->selling_price;
    }

    public function addOrder(Request $request)
    {

        $itemArray = $request->get('dataArray');

        $deliveryProcess = $request->get('deliveryProcess');
        $date = $request->get('date');
        $month = $request->get('month');
        $shipment_code = $request->get('shipment_code');
        $name = $request->get('name');
        $order_source = $request->get('order_source');
        $Location_address = $request->get('Location_address');
        $telephone = $request->get('telephone');
        $notes = $request->get('notes');
        $deposit_type = $request->get('deposit_type');
        $first_payment = $request->get('first_payment');
        $deliverycompany_id = intval($request->get('deliverycompany_id'));
        $zone_id = intval($request->get('zone_id'));


        $order = new Order();
        $order->delivery_process = $deliveryProcess;
        $order->date = $date;
        $order->month = $month;
        $order->shipment_code = $shipment_code;
        $order->name = $name;
        $order->order_source = $order_source;
        $order->Location_address = $Location_address;
        $order->telephone = $telephone;
        $order->notes = $notes;
        $order->deposit_type = $deposit_type;
        $order->first_payment = $first_payment;
        $order->deliverycompany_id = $deliverycompany_id;
        $order->zone_id = $zone_id;

        //Save cart item encorded array
        $order->cart_items = json_encode($itemArray);
        //save all data to db
        $order->save();


        $ship = DB::table('citys')
            ->where('deliverycompany_id', $deliverycompany_id)
            ->where('zone_id', $zone_id)
            ->get();

        //get zone price for one variable can use future
        $shipPrice = $ship[0]->price;

        foreach ($itemArray as $itemS) {

            if ($order->delivery_process == 'Dispatch') {
                $dispatchQuantity = $itemS['quantity'];
                $item = DB::table('items')->where('id', $itemS['item_id'])->first();
                $item_quantity = $item->quantity;
                DB::table('items')->where('id', $itemS['item_id'])->update(['quantity' => ($item_quantity - $dispatchQuantity)]);
            } else if ($order->delivery_process == 'Return') {
                $returnQuantity = $itemS['quantity'];
                $item = DB::table('items')->where('id', $itemS['item_id'])->first();
                $item_quantity = $item->quantity;
                DB::table('items')->where('id', $itemS['item_id'])->update(['quantity' => ($item_quantity + $returnQuantity)]);
            } else if ($order->delivery_process == 'Pickup') {
                $pickupQuantity = $itemS['quantity'];
                $item = DB::table('items')->where('id', $itemS['item_id'])->first();
                $item_quantity = $item->quantity;
                DB::table('items')->where('id', $itemS['item_id'])->update(['quantity' => ($item_quantity - $pickupQuantity)]);
            }
        }


        // $paymentType = new Paymenttype();
        // $paymentType->order_id = $order->id;
        // $paymentType->name = $order->name;
        // $paymentType->deposit_type = $order->deposit_type;
        // $paymentType->amount = $order->first_payment;
        // $paymentType->pay_to_future = (($item_price * $order_quantity) - $first_payment);

        // $paymentType->save();

        Session::put('flash_message', "Order Added Sucessfull");
    }

    public function printSelect()
    {
        $perPage = 10;
        $orders = Order::latest()->paginate($perPage);
        return view('admin.orders.orderselect', compact('orders'));
    }

    public function printAll()
    {
        $perPage = 10;
        $orders = Order::latest()->paginate($perPage);
        return view('admin.orders.print', compact('orders'));
    }

    public function selectedItems(Request $request)
    {
        $selectedArray =  $request->selectdata;
        $perPage = 10;
        $orders = array();

        if( sizeof($selectedArray) > 0 ){
            for($i=0; $i< sizeof($selectedArray); $i++){
                $order = Order::findOrFail($selectedArray[$i]);
                array_push($orders,$order);
            }
        }

        return view('admin.orders.print', compact('orders'));
    }
}

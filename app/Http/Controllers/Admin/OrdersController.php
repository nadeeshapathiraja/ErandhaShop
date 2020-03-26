<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\City;
use App\Deliverycompany;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Item;
use App\Order;
use Illuminate\Http\Request;

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
                ->orWhere('city_id', 'LIKE', "%$keyword%")
                ->orWhere('telephone', 'LIKE', "%$keyword%")
                ->orWhere('notes', 'LIKE', "%$keyword%")
                ->orWhere('delivery_process', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $orders = Order::latest()->paginate($perPage);
        }

        return view('admin.orders.index', compact('orders'));
    }


    public function create()
    {
        $items =Item::all();
        $citys =City::all();
        $categorys =Category::all();
        $deliverycompanys= Deliverycompany::all();
        return view('admin.orders.create',compact('items','citys','categorys','deliverycompanys'));
    }


    public function store(Request $request)
    {

        $requestData = $request->all();

        Order::create($requestData);

        return redirect('orders')->with('flash_message', 'Order added!');
    }


    public function show($id)
    {
        $order = Order::findOrFail($id);
        $items =Item::all();
        return view('admin.orders.show', compact('order','items'));
    }


    public function edit($id)
    {
        $order = Order::findOrFail($id);
        $items =Item::all();
        $citys =City::all();
        $categorys =Category::all();
        $deliverycompanys= Deliverycompany::all();
        return view('admin.orders.edit', compact('order','items','citys','categorys','deliverycompanys'));
    }


    public function update(Request $request, $id)
    {

        $requestData = $request->all();

        $order = Order::findOrFail($id);
        $order->update($requestData);

        return redirect('orders')->with('flash_message', 'Order updated!');
    }


    public function destroy($id)
    {
        Order::destroy($id);

        return redirect('orders')->with('flash_message', 'Order deleted!');
    }
}

<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Item;
use App\Category;
use App\Moneytransaction;
use App\Zone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class itemsController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 10;

        if (!empty($keyword)) {
            $items = item::where('photo', 'LIKE', "%$keyword%")
                ->orWhere('category_id', 'LIKE', "%$keyword%")
                ->orWhere('product_code', 'LIKE', "%$keyword%")
                ->orWhere('description', 'LIKE', "%$keyword%")
                ->orWhere('quantity', 'LIKE', "%$keyword%")
                ->orWhere('dolour_rate', 'LIKE', "%$keyword%")
                ->orWhere('product_cost', 'LIKE', "%$keyword%")
                ->orWhere('discount', 'LIKE', "%$keyword%")
                ->orWhere('tax', 'LIKE', "%$keyword%")
                ->orWhere('clearance_charge', 'LIKE', "%$keyword%")
                ->orWhere('slmarket_price', 'LIKE', "%$keyword%")
                ->orWhere('selling_price', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $items = item::latest()->paginate($perPage);
        }


        return view('Admin.items.index', compact('items'));
    }


    public function create()
    {
        $allcategorys = Category::all();
        $zones = Zone::all();

        return view('Admin.items.create', compact('allcategorys', 'zones'));
    }


    public function store(Request $request)
    {

        $requestData = $request->all();
        if ($request->hasFile('photo')) {
            $requestData['photo'] = $request->file('photo')
                ->store('uploads', 'public');
        }



        $requestData = $request->all();
        $item = Item::create($requestData);
        $clearance_charge = $item->clearance_charge;
        $quantity = $item->quantity;
        $product_cost = $item->product_cost;
        $discount = $item->discount;
        $tax = $item->tax;
        $dolour_rate = $item->dolour_rate;

        //Data send to transaction page
        $ternsaction = new Moneytransaction();
        $ternsaction->item_id = $item->id;

        //1. Calculate total clearance
        $ternsaction->total_clearance = ($clearance_charge * $quantity);

        //  Calculate after offer for one item
        //  $ternsaction->value_with_offer_for_1 = ($product_cost-$discount);

        //2. Calculate after offer for all items
        $ternsaction->value_with_offer = ($product_cost - $discount) * $quantity;

        //Calculate total cost for one item
        //$ternsaction->total_cost_for_1 = ($product_cost-$discount+$tax);

        //3. Calculate total cost for all items
        $ternsaction->total_cost = ($product_cost - $discount + $tax) * $quantity;

        //Calculate rs value for one item
        //$ternsaction->rs_value_for_1 = ($product_cost-$discount+$tax)*$dolour_rate;

        //4. Calculate rs value for all item
        $ternsaction->rs_value = (($product_cost - $discount + $tax) * $dolour_rate) * $quantity;

        //5. Cost of products for one item
        $ternsaction->product_cost = (($product_cost - $discount + $tax) * $dolour_rate) + $clearance_charge;

        //6. Cost of products for all item
        $ternsaction->total_product_cost = ((($product_cost - $discount + $tax) * $dolour_rate) * $quantity) + ($clearance_charge * $quantity);





        $ternsaction->save();

        $file = $request->file('photo');
        $destinationPath = public_path('images/items/');
        $file->move($destinationPath, $item->id);

        return redirect('items')->with('flash_message', 'item added!');
    }


    public function show($id)
    {
        $item = item::findOrFail($id);

        return view('Admin.items.show', compact('item'));
    }
    public function showcart($id)
    {
        $items = item::findOrFail($id);

        return view('/', compact('items'));
    }

    public function cartItems()
    {
        $perPage = 10;
        $item = item::latest()->paginate($perPage);
        return view('welcome ', compact('item'));
    }


    public function edit($id)
    {
        $item = item::findOrFail($id);
        $allcategorys = Category::all();
        return view('Admin.items.edit', compact('item', 'allcategorys'));
    }


    public function update(Request $request, $id)
    {

        $requestData = $request->all();
        if ($request->hasFile('photo')) {
            $requestData['photo'] = $request->file('photo')
                ->store('uploads', 'public');
        }

        $item = item::findOrFail($id);
        $item->update($requestData);

        return redirect('items')->with('flash_message', 'item updated!');
    }


    public function destroy($id)
    {
        item::destroy($id);

        return redirect('items')->with('flash_message', 'item deleted!');
    }
}
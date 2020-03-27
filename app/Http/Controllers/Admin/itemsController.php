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
    public function __construct()
    {
        $this->middleware('auth');
    }

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
        $allcategorys =Category::all();
        $zones= Zone::all();

        return view('Admin.items.create',compact('allcategorys','zones'));
    }


    public function store(Request $request)
    {

        $requestData = $request->all();
                if ($request->hasFile('photo')) {
            $requestData['photo'] = $request->file('photo')
                ->store('uploads', 'public');
        }

        item::create($requestData);

        $requestData = $request->all();
        $item = Item::create($requestData);
        $clearance_charge = $item->clearance_charge;
        $quantity=$item->quantity;
        $clearance_charge = $item->clearance_charge;
        $quantity=$item->quantity;


        //data send to tranmsaction page
        $ternsaction = new Moneytransaction();
        $ternsaction->total_clearance = ($clearance_charge * $quantity);
        $ternsaction->save();

        return redirect('items')->with('flash_message', 'item added!');
    }


    public function show($id)
    {
        $item = item::findOrFail($id);

        return view('Admin.items.show', compact('item'));
    }


    public function edit($id)
    {
        $item = item::findOrFail($id);
        $allcategorys =Category::all();
        return view('Admin.items.edit', compact('item','allcategorys'));
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

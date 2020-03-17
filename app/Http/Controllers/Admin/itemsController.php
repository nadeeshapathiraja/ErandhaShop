<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\item;
use Illuminate\Http\Request;

class itemsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

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
        return view('Admin.items.create');
    }


    public function store(Request $request)
    {

        $requestData = $request->all();

        item::create($requestData);

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

        return view('Admin.items.edit', compact('item'));
    }


    public function update(Request $request, $id)
    {

        $requestData = $request->all();

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

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Moneytransaction;
use Illuminate\Http\Request;

class MoneytransactionsController extends Controller
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
            $moneytransactions = Moneytransaction::where('item_id', 'LIKE', "%$keyword%")
                ->orWhere('total_clearance', 'LIKE', "%$keyword%")
                ->orWhere('value_with_offer', 'LIKE', "%$keyword%")
                ->orWhere('total_cost', 'LIKE', "%$keyword%")
                ->orWhere('rs_value', 'LIKE', "%$keyword%")
                ->orWhere('product_cost', 'LIKE', "%$keyword%")
                ->orWhere('total_product_cost', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $moneytransactions = Moneytransaction::latest()->paginate($perPage);
        }

        return view('Admin.moneytransactions.index', compact('moneytransactions'));
    }


    public function create()
    {
        return view('Admin.moneytransactions.create');
    }


    public function store(Request $request)
    {

        $requestData = $request->all();

        Moneytransaction::create($requestData);

        return redirect('moneytransactions')->with('flash_message', 'Moneytransaction added!');
    }


    public function show($id)
    {
        $moneytransaction = Moneytransaction::findOrFail($id);

        return view('Admin.moneytransactions.show', compact('moneytransaction'));
    }


    public function edit($id)
    {
        $moneytransaction = Moneytransaction::findOrFail($id);

        return view('Admin.moneytransactions.edit', compact('moneytransaction'));
    }


    public function update(Request $request, $id)
    {

        $requestData = $request->all();

        $moneytransaction = Moneytransaction::findOrFail($id);
        $moneytransaction->update($requestData);

        return redirect('moneytransactions')->with('flash_message', 'Moneytransaction updated!');
    }


    public function destroy($id)
    {
        Moneytransaction::destroy($id);

        return redirect('moneytransactions')->with('flash_message', 'Moneytransaction deleted!');
    }
}

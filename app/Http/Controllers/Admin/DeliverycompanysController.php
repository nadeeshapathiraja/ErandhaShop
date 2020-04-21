<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Deliverycompany;
use App\Zone;
use Illuminate\Http\Request;

class DeliverycompanysController extends Controller
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
            $deliverycompanys = Deliverycompany::where('name', 'LIKE', "%$keyword%")
                ->orWhere('zone', 'LIKE', "%$keyword%")
                ->orWhere('price', 'LIKE', "%$keyword%")
                ->orWhere('maxweight', 'LIKE', "%$keyword%")
                ->orWhere('additional', 'LIKE', "%$keyword%")
                ->orWhere('cod_less', 'LIKE', "%$keyword%")
                ->orWhere('cod_above', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $deliverycompanys = Deliverycompany::latest()->paginate($perPage);
        }

        return view('Admin.deliverycompanys.index', compact('deliverycompanys'));
    }


    public function create()
    {
        $zones= Zone::all();
        return view('Admin.deliverycompanys.create',compact('zones'));
    }


    public function store(Request $request)
    {

        $requestData = $request->all();

        Deliverycompany::create($requestData);

        return redirect('deliverycompanys')->with('flash_message', 'Deliverycompany added!');
    }


    public function show($id)
    {
        $deliverycompany = Deliverycompany::findOrFail($id);

        return view('Admin.deliverycompanys.show', compact('deliverycompany'));
    }


    public function edit($id)
    {
        $deliverycompany = Deliverycompany::findOrFail($id);

        return view('Admin.deliverycompanys.edit', compact('deliverycompany'));
    }


    public function update(Request $request, $id)
    {

        $requestData = $request->all();

        $deliverycompany = Deliverycompany::findOrFail($id);
        $deliverycompany->update($requestData);

        return redirect('deliverycompanys')->with('flash_message', 'Deliverycompany updated!');
    }


    public function destroy($id)
    {
        Deliverycompany::destroy($id);

        return redirect('deliverycompanys')->with('flash_message', 'Deliverycompany deleted!');
    }
}

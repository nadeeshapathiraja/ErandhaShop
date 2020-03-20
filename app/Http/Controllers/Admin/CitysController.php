<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\City;
use App\Deliverycompany;
use App\Zone;
use Illuminate\Http\Request;

class CitysController extends Controller
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
            $citys = City::where('name', 'LIKE', "%$keyword%")
                ->orWhere('deliverycompany_id', 'LIKE', "%$keyword%")
                ->orWhere('zone_id', 'LIKE', "%$keyword%")
                ->orWhere('postal_code', 'LIKE', "%$keyword%")
                ->orWhere('price', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $citys = City::latest()->paginate($perPage);
        }

        return view('Admin.citys.index', compact('citys'));
    }


    public function create()
    {
        $deliverycompanys =Deliverycompany::all();
        $zones= Zone::all();
        return view('Admin.citys.create',compact('deliverycompanys','zones'));
    }


    public function store(Request $request)
    {

        $requestData = $request->all();

        City::create($requestData);

        return redirect('citys')->with('flash_message', 'City added!');
    }


    public function show($id)
    {
        $city = City::findOrFail($id);
        $deliverycompanys =Deliverycompany::all();
        $zones= Zone::all();
        return view('Admin.citys.show', compact('city','deliverycompanys','zones'));
    }


    public function edit($id)
    {
        $city = City::findOrFail($id);
        $deliverycompanys =Deliverycompany::all();
        $zones= Zone::all();
        return view('Admin.citys.edit', compact('city','deliverycompanys','zones'));
    }


    public function update(Request $request, $id)
    {

        $requestData = $request->all();
        $deliverycompanys =Deliverycompany::all();
        $city = City::findOrFail($id);
        $city->update($requestData);

        return redirect('citys')->with('flash_message', 'City updated!');
    }


    public function destroy($id)
    {
        City::destroy($id);

        return redirect('citys')->with('flash_message', 'City deleted!');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Supplyer;
use Illuminate\Http\Request;

class SupplyersController extends Controller
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
            $supplyers = Supplyer::where('name', 'LIKE', "%$keyword%")
                ->orWhere('country', 'LIKE', "%$keyword%")
                ->orWhere('item_id', 'LIKE', "%$keyword%")
                ->orWhere('quantity', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $supplyers = Supplyer::latest()->paginate($perPage);
        }

        return view('Admin.supplyers.index', compact('supplyers'));
    }


    public function create()
    {
        return view('Admin.supplyers.create');
    }


    public function store(Request $request)
    {

        $requestData = $request->all();

        Supplyer::create($requestData);

        return redirect('supplyers')->with('flash_message', 'Supplyer added!');
    }


    public function show($id)
    {
        $supplyer = Supplyer::findOrFail($id);

        return view('Admin.supplyers.show', compact('supplyer'));
    }


    public function edit($id)
    {
        $supplyer = Supplyer::findOrFail($id);

        return view('Admin.supplyers.edit', compact('supplyer'));
    }


    public function update(Request $request, $id)
    {

        $requestData = $request->all();

        $supplyer = Supplyer::findOrFail($id);
        $supplyer->update($requestData);

        return redirect('supplyers')->with('flash_message', 'Supplyer updated!');
    }


    public function destroy($id)
    {
        Supplyer::destroy($id);

        return redirect('supplyers')->with('flash_message', 'Supplyer deleted!');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Paymenttype;
use Illuminate\Http\Request;

class PaymenttypesController extends Controller
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
            $paymenttypes = Paymenttype::where('order_id', 'LIKE', "%$keyword%")
                ->orWhere('name', 'LIKE', "%$keyword%")
                ->orWhere('deposit_type', 'LIKE', "%$keyword%")
                ->orWhere('amount', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $paymenttypes = Paymenttype::latest()->paginate($perPage);
        }

        return view('Admin.paymenttypes.index', compact('paymenttypes'));
    }


    public function create()
    {
        return view('Admin.paymenttypes.create');
    }


    public function store(Request $request)
    {

        $requestData = $request->all();

        Paymenttype::create($requestData);

        return redirect('paymenttypes')->with('flash_message', 'Paymenttype added!');
    }


    public function show($id)
    {
        $paymenttype = Paymenttype::findOrFail($id);

        return view('Admin.paymenttypes.show', compact('paymenttype'));
    }


    public function edit($id)
    {
        $paymenttype = Paymenttype::findOrFail($id);

        return view('Admin.paymenttypes.edit', compact('paymenttype'));
    }


    public function update(Request $request, $id)
    {

        $requestData = $request->all();

        $paymenttype = Paymenttype::findOrFail($id);
        $paymenttype->update($requestData);

        return redirect('paymenttypes')->with('flash_message', 'Paymenttype updated!');
    }


    public function destroy($id)
    {
        Paymenttype::destroy($id);

        return redirect('paymenttypes')->with('flash_message', 'Paymenttype deleted!');
    }
}

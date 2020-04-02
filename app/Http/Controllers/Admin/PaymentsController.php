<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Payment;
use Illuminate\Http\Request;

class PaymentsController extends Controller
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
            $payments = Payment::where('date', 'LIKE', "%$keyword%")
                ->orWhere('order_id', 'LIKE', "%$keyword%")
                ->orWhere('name', 'LIKE', "%$keyword%")
                ->orWhere('Paymenttypes', 'LIKE', "%$keyword%")
                ->orWhere('payment', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $payments = Payment::latest()->paginate($perPage);
        }

        return view('Admin.payments.index', compact('payments'));
    }



    public function create()
    {
        return view('Admin.payments.create');
    }



    public function store(Request $request)
    {

        $requestData = $request->all();

        Payment::create($requestData);

        return redirect('payments')->with('flash_message', 'Payment added!');
    }



    public function show($id)
    {
        $payment = Payment::findOrFail($id);

        return view('Admin.payments.show', compact('payment'));
    }



    public function edit($id)
    {
        $payment = Payment::findOrFail($id);

        return view('Admin.payments.edit', compact('payment'));
    }



    public function update(Request $request, $id)
    {

        $requestData = $request->all();

        $payment = Payment::findOrFail($id);
        $payment->update($requestData);

        return redirect('payments')->with('flash_message', 'Payment updated!');
    }


     
    public function destroy($id)
    {
        Payment::destroy($id);

        return redirect('payments')->with('flash_message', 'Payment deleted!');
    }
}

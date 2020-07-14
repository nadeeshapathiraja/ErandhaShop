<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\SupplyerCost;
use Illuminate\Http\Request;

class SupplyerCostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $supplyercost = SupplyerCost::where('supplyer_id', 'LIKE', "%$keyword%")
                ->orWhere('name', 'LIKE', "%$keyword%")
                ->orWhere('order_id', 'LIKE', "%$keyword%")
                ->orWhere('price', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $supplyercost = SupplyerCost::latest()->paginate($perPage);
        }

        return view('Admin.supplyer-cost.index', compact('supplyercost'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('Admin.supplyer-cost.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        
        $requestData = $request->all();
        
        SupplyerCost::create($requestData);

        return redirect('supplyer-cost')->with('flash_message', 'SupplyerCost added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $supplyercost = SupplyerCost::findOrFail($id);

        return view('Admin.supplyer-cost.show', compact('supplyercost'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $supplyercost = SupplyerCost::findOrFail($id);

        return view('Admin.supplyer-cost.edit', compact('supplyercost'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        
        $requestData = $request->all();
        
        $supplyercost = SupplyerCost::findOrFail($id);
        $supplyercost->update($requestData);

        return redirect('supplyer-cost')->with('flash_message', 'SupplyerCost updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        SupplyerCost::destroy($id);

        return redirect('supplyer-cost')->with('flash_message', 'SupplyerCost deleted!');
    }
}

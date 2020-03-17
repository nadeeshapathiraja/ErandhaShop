<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Zone;
use Illuminate\Http\Request;

class ZonesController extends Controller
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
            $zones = Zone::where('name', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $zones = Zone::latest()->paginate($perPage);
        }

        return view('Admin.zones.index', compact('zones'));
    }


    public function create()
    {
        return view('Admin.zones.create');
    }


    public function store(Request $request)
    {

        $requestData = $request->all();

        Zone::create($requestData);

        return redirect('zones')->with('flash_message', 'Zone added!');
    }


    public function show($id)
    {
        $zone = Zone::findOrFail($id);

        return view('Admin.zones.show', compact('zone'));
    }


    public function edit($id)
    {
        $zone = Zone::findOrFail($id);

        return view('Admin.zones.edit', compact('zone'));
    }


    public function update(Request $request, $id)
    {

        $requestData = $request->all();

        $zone = Zone::findOrFail($id);
        $zone->update($requestData);

        return redirect('zones')->with('flash_message', 'Zone updated!');
    }


    public function destroy($id)
    {
        Zone::destroy($id);

        return redirect('zones')->with('flash_message', 'Zone deleted!');
    }
}

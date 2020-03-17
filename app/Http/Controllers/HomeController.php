<?php

namespace App\Http\Controllers;
use App\Order;
use App\Item;
use App\City;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $oc=Order::order_count();
        $ic=Item::item_count();
        return view('home',compact('oc','ic'));
    }
}

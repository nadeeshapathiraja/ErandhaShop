<?php

namespace App\Http\Controllers;
use App\Order;
use App\Item;
use App\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

        $Pickup = DB::table('orders')->where('delivery_process','Pickup')->count();
        $Onprocess = DB::table('orders')->where('delivery_process','Onprocess')->count();
        $Dispatch = DB::table('orders')->where('delivery_process','Dispatch')->count();
        $Deliverd = DB::table('orders')->where('delivery_process','Deliverd')->count();
        $Return = DB::table('orders')->where('delivery_process','Return')->count();


        return view('home',compact('oc','ic','Pickup','Return','Onprocess','Dispatch','Deliverd'));
    }
}

<?php

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Item;
use App\Category;
use App\Moneytransaction;
use App\Zone;
use Facade\FlareClient\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View as ViewView;

class DisplayItem extends Controller
{


    public function show($id)
    {
        $item = item::findOrFail($id);

        // // return view('welcome', compact('item'));
        // View::make('welcome', ['counter'=>$count]);
        // return View::make("welcome")->with(array('item'=>$item));
        return view('welcome', $item)->with(array('item'=>$item));
    }



}

<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//for views
Route::resource('zones', 'Admin\\ZonesController');
Route::resource('deliverycompanys', 'Admin\\DeliverycompanysController');
Route::resource('citys', 'Admin\\CitysController');
Route::resource('categorys', 'Admin\\CategorysController');
Route::resource('orders', 'Admin\\OrdersController');
Route::resource('paymenttypes', 'Admin\\PaymenttypesController');
Route::resource('moneytransactions', 'Admin\\MoneytransactionsController');
Route::resource('supplyers', 'Admin\\SupplyersController');
Route::resource('items', 'Admin\\itemsController');
Route::resource('clients', 'Admin\\ClientsController');
Route::resource('payments', 'Admin\\PaymentsController');
Route::resource('payments', 'Admin\\PaymentsController');


//Ajax request for shopping cart
Route::post('/getDataAjax','Admin\\OrdersController@getDataAjax');

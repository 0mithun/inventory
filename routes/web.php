<?php

use Illuminate\Support\Facades\Route;

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
    return redirect()->route('dashboard');
});

Route::get('/get-all-user','OrderController@getUser');
Route::get('/get-all-product/{q}','OrderController@getProduct');

Route::post('/get-user','OrderController@getUserById');
Route::post('/get-product','OrderController@getProductById');

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth'])->group(function (){
    Route::get('/dashboard','DashboardController@index')->name('dashboard');
    Route::resource('products','ProductController');
    Route::resource('orders','OrderController');
    Route::get('/send-to-inventory','ProductController@sentToInventory')->name('sent.inventory');

    Route::post('/inventory/submit-order','InventoryController@store');
    Route::post('/inventory/update-status/','InventoryController@update')->name('inventory.update.status');

    Route::get('/check-inventory','InventoryController@index')->name('inventory.check');
    Route::get('/get-inventory/{inventory}','InventoryController@show');
});

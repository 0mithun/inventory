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
    return view('welcome');
});

Route::get('/get-all-user','OrderController@getUser');
Route::get('/get-all-product','OrderController@getProduct');

Route::post('/get-user','OrderController@getUserById');
Route::post('/get-product','OrderController@getProductById');

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth'])->group(function (){
    Route::get('/dashboard','DashboardController@index')->name('dashboard');
    Route::resource('products','ProductController');
    Route::resource('orders','OrderController');
    Route::get('/send-to-inventory','ProductController@sentToInventory')->name('sent.inventory');
});

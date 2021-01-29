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

Route::get('/', 'OrderController@index');
Route::get('/order', 'OrderController@order');
Route::post('/createorder', 'OrderController@orderCreate');
Route::get('/list_order', 'OrderController@listOrder');
// Route::get('/show_order', 'OrderController@showOrder');

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


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/storeItem', 'CartController@storeItem');
Route::get('/getItems', 'CartController@getItems');
Route::post('/deleteItem/{id}', 'CartController@deleteItem');
Route::post('/editItem/{id}', 'CartController@editItem');
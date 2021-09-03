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
    return view('guest.home');
});


//rotte di autenticazione
Auth::routes();

Route::middleware('auth')
    ->namespace('Admin')
    ->prefix('admin')
    ->name('admin.')
    ->group(function() {

    Route::get('/', 'HomeController@showRestaurant')->name('index');
    Route::resource('restaurants', 'RestaurantController');
    Route::resource('plates', 'PlateController');
});


//rotte pubbliche
Route::get('{any?}', 'HomeController@index')->where('any', '.*')->name('home');
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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/test/create', 'RestaurantController@create')->name('dishes-create');
Route::post('/test/store', 'RestaurantController@store')->name('dishes-store');


Route::get('/dash', function () {
    return view('pages.dash');
});

Route::get('/myfoods', function () {
    return view('pages.myfoods');
});


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


Auth::routes();

// Homepage
Route::get('/', 'PublicController@index') -> name('homepage');

Route::get('/home', 'HomeController@index')->name('home'); //va a dashboard
Route::get('/myfoods', 'DishController@index')->name('dishes-index');
Route::get('/test/create', 'DishController@create')->name('dishes-create');
Route::post('/test/store', 'DishController@store')->name('dishes-store');
Route::get('/test/edit/{id}', 'DishController@edit')->name('dishes-edit');
Route::post('/test/update/{id}', 'DishController@update')->name('dishes-update');


//Route::get('/menu', function() {
//   $restaurant = \App\User::findOrfail(11);
//   $dishes = $restaurant -> dishes() -> get();
//   return view('pages.menu-index', compact('restaurant', 'dishes'));
//}) -> name('restaurant-menu');

Route::get('/restaurant/menu/{id}', 'PublicController@getRestaurantMenu') -> name('restaurant-menu');


Route::get('/checkout', function(){
    return view('pages.checkout');
});
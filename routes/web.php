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

// PUBLIC
Route::get('/', 'PublicController@index') -> name('homepage');
Route::get('/menu/restaurant/{id}', 'PublicController@getRestaurantMenu') -> name('restaurant-menu');
Route::get('/checkout', 'PublicController@checkout') -> name('checkout');

// ADMIN RESTAURANT
Route::prefix('my-restaurant')->group(function () {

//    /admin/dashboard -> Elenco piatti aggiunti dal ristorante
    Route::get('/dashboard', 'RestaurantController@index') -> name('dashboard'); //va a dashboard

//    /admin/myfoods -> Elenco piatti aggiunti dal ristorante
    Route::get('/dishes', 'DishController@index') -> name('dishes-index');

//    /dish/create -> Form per aggiungere un piatto e salvarlo
    Route::get('/dish/create', 'DishController@create') -> name('dishes-create');
    Route::post('/dish/store', 'DishController@store') -> name('dishes-store');

//    /dish/create -> Form per aggiungere un piatto e salvarlo
    Route::get('/dish/edit/{id}', 'DishController@edit') -> name('dishes-edit');
    Route::post('/dish/update/{id}', 'DishController@update') -> name('dishes-update');

});



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
    return view('pages.homepage');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home'); //va a dashboard
Route::get('/myfoods', 'DishController@index')->name('dishes-index');
Route::get('/test/create', 'DishController@create')->name('dishes-create');
Route::post('/test/store', 'DishController@store')->name('dishes-store');
Route::get('/test/edit/{id}', 'DishController@edit')->name('dishes-edit');
Route::post('/test/update/{id}', 'DishController@update')->name('dishes-update');


Route::get('/menu', function(){
    return view('pages.menu-index');
});



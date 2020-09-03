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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'ProductController@index');
Route::get('/create', 'ProductController@create');
Route::post('/store', [
    'as' => 'store',
    'uses' =>'ProductController@store'
]);
Route::get('/update/{product}/edit', 'ProductController@edit');
Route::patch('/update/{product}', [
    'as' => 'update.product',
    'uses' => 'ProductController@update'
]);

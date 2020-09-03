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
Route::delete('/delete/{product}', [
    'as' => 'destroy.product',
    'uses' => 'ProductController@destroy'
]);
Route::get('/removed', 'ProductController@removedProducts');
Route::patch('/product/restore/{product}', [
    'as' => 'restore.product',
    'uses' => 'ProductController@restore'
]);
Route::delete('/remove/{product}', [
    'as' => 'remove.product',
    'uses' => 'ProductController@forceDelete'
]);

//Route::resource('product', 'ProductController');
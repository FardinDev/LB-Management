<?php

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


//gets

Route::get('/pdf', 'PdfController@index')->name('pdf.index');
Route::get('/', 'ProductController@home')->name('product.home');
Route::get('/add', 'ProductController@add')->name('add');
Route::get('/addNew', 'ProductController@addNew')->name('product.addNew');
Route::get('/remove', 'ProductController@remove')->name('remove');
Route::get('/remove/empty/{id}','ProductController@empty')->name('product.empty');

Route::get('/sell', function () {
    return view('sell');
});

//posts
Route::POST('/addNew', 'ProductController@store')->name('product.store');
Route::POST('/add','ProductController@update')->name('product.update');
Route::POST('/add/fetch','ProductController@fetch')->name('product.fetch');
Route::POST('/show','ProductController@show')->name('product.show');
Route::POST('/remove/remove','ProductController@delete')->name('product.remove');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

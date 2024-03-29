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

Route::get('/', function () {
    return redirect('listaArq');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/uploadArq', 'HomeController@uploadArq')->name('uploadArq');
Route::get('/listaArq', 'HomeController@listaArq')->name('listaArq');
Route::get('/cadastrar', 'HomeController@cadastrar')->name('cadastrar');
Route::post('/deleteArq', 'HomeController@deleteArq')->name('deleteArq');
Route::get('/downloadArq/{id}', 'HomeController@downloadArq')->name('downloadArq');


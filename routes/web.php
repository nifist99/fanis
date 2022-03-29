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

Route::get('/','FrontController@index');
Route::get('home','FrontController@index');
Route::get('detail/{id}','FrontController@detail');
Route::get('genre','FrontController@genre');
Route::get('kategori/{nama}','FrontController@kategori');
Route::get('tag/{id}','FrontController@tag');

Route::post('search','FrontController@search');

Route::get('by/{nama}','FrontController@by');

Route::post('suscribe','FrontController@suscribe');
Route::post('kontak','FrontController@kontak');

Route::post('komentar','FrontController@komentar');

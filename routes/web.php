<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\BerandaController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'App\Http\Controllers\BerandaController@index');
Route::get('/tentang', 'App\Http\Controllers\BerandaController@about');

Route::get('/login', 'App\Http\Controllers\LoginController@index')->name('login')->middleware('guest');
Route::post('/login', 'App\Http\Controllers\LoginController@authenticate');
Route::post('/logout', 'App\Http\Controllers\LoginController@logout');

Route::get('/register', 'App\Http\Controllers\RegisterController@index')->middleware('guest');
Route::post('/register', 'App\Http\Controllers\RegisterController@store');

Route::get('/produk', 'App\Http\Controllers\ProdukController@index');
Route::get('/produk/create', 'App\Http\Controllers\ProdukController@create');
Route::post('/produk', 'App\Http\Controllers\ProdukController@store');
Route::get('/produk/{barang}/edit', 'App\Http\Controllers\ProdukController@edit');
Route::delete('/produk/{barang}', 'App\Http\Controllers\ProdukController@destroy');
Route::patch('/produk/{barang}', 'App\Http\Controllers\ProdukController@update');


Route::get('/pesan/{id}', 'App\Http\Controllers\PesanController@index');
Route::post('/pesan/{id}', 'App\Http\Controllers\PesanController@pesan');
Route::get('/check-out', 'App\Http\Controllers\PesanController@check_out');
Route::delete('/check-out/{id}', 'App\Http\Controllers\PesanController@destroy');
Route::get('/konfirmasi-check-out', 'App\Http\Controllers\PesanController@konfirmasi');

Route::get('/profile', 'App\Http\Controllers\ProfileController@index');
Route::post('/profile', 'App\Http\Controllers\ProfileController@update');

Route::get('/history', 'App\Http\Controllers\HistoryController@index');
Route::get('/history/{id}', 'App\Http\Controllers\HistoryController@detail');
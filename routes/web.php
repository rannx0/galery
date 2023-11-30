<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageGalleryController;
use App\Http\Controllers\KontenController;
use App\Http\Controllers\GaleriController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('image-gallery', 'App\Http\Controllers\ImageGalleryController@index');
Route::post('image-gallery', 'App\Http\Controllers\ImageGalleryController@create');
Route::delete('image-gallery/{id}', 'App\Http\Controllers\ImageGalleryController@destroy');


// Konten

// Route::get('/', 'App\Http\Controllers\KontenController@index')->name('index');
// Route::get('/create', 'App\Http\Controllers\KontenController@create')->name('create');
// Route::post('store/', 'App\Http\Controllers\KontenController@store')->name('store');
// Route::get('show/{id}', 'App\Http\Controllers\KontenController@show')->name('show');
// Route::get('edit/{id}', 'App\Http\Controllers\KontenController@edit')->name('edit');
// Route::put('edit/{id}','App\Http\Controllers\KontenController@update')->name('update');
// Route::delete('/{id}','App\Http\Controllers\KontenController@destroy')->name('destroy');

//new

Route::resource('galeris', 'App\Http\Controllers\GaleriController');
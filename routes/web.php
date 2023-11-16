<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageGalleryController;
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

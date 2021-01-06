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
    return view ('dashboard');
})->middleware('auth');

Auth::routes();

//Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

Route::get('/', '\App\Http\Controllers\DashboardController@dashboard');

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');

Route::post('posts', '\App\Http\Controllers\PostsController@store');

Route::post('comments', 'App\Http\Controllers\CommentsController@store');

//Route::post('comments', [CommentsController::class, 'store']);


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
    return view('admin.schools.index');
});
Route::group(['prefix' => 'schools'], function () {
    Route::get('/', [App\Http\Controllers\SchoolController::class, 'index']);
    Route::get('/render',  [App\Http\Controllers\SchoolController::class, 'render_data']);
    Route::get('/search',  [App\Http\Controllers\SchoolController::class, 'search']);
    Route::get('/add', [App\Http\Controllers\SchoolController::class, 'add']);
    Route::get('/store', [App\Http\Controllers\SchoolController::class, 'store']);
    Route::get('/edit/{id}', [App\Http\Controllers\SchoolController::class, 'edit']);
    Route::get('/update', [App\Http\Controllers\SchoolController::class, 'update']);
    Route::get('/destroy/{id}', [App\Http\Controllers\SchoolController::class, 'destroy']);
});
Route::group(['prefix' => 'users'], function () {
    Route::get('/', [App\Http\Controllers\UserController::class, 'index']);
    Route::get('/render',  [App\Http\Controllers\UserController::class, 'render_data']);
    Route::get('/search',  [App\Http\Controllers\UserController::class, 'search']);
    Route::get('/add', [App\Http\Controllers\UserController::class, 'add']);
    Route::get('/store', [App\Http\Controllers\UserController::class, 'store']);
    Route::get('/edit/{id}', [App\Http\Controllers\UserController::class, 'edit']);
    Route::get('/update', [App\Http\Controllers\UserController::class, 'update']);
    Route::get('/destroy/{id}', [App\Http\Controllers\UserController::class, 'destroy']);
});

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
Route::any('/', [App\Http\Controllers\Auth\AuthController::class, 'showLogin']);
Route::any('login', [App\Http\Controllers\Auth\AuthController::class, 'showLogin'])->name('login');
Route::post('/doLogin', [App\Http\Controllers\Auth\AuthController::class, 'doLogin']);
Route::get('/logout', [App\Http\Controllers\Auth\AuthController::class, 'logout']);

Route::group(['middleware' => 'auth' ], function () {
    Route::group(['prefix' => 'schools'], function() {
        Route::get('/', [\App\Http\Controllers\SchoolManageController::class, 'index']);
        Route::get('/add', [\App\Http\Controllers\SchoolManageController::class, 'add']);
    });

    Route::group(['prefix' => 'admin'], function() {
        Route::get('/', [\App\Http\Controllers\AdminController::class, 'index']);
        Route::get('/add', [\App\Http\Controllers\AdminController::class, 'add']);
    });

    Route::group(['prefix' => 'users'], function() {
        Route::get('/', [\App\Http\Controllers\UserController::class, 'index']);
        Route::get('/add', [\App\Http\Controllers\UserController::class, 'add']);
    });

    Route::group(['prefix' => 'vrs'], function() {
        Route::get('/', [App\Http\Controllers\VRManageController::class, 'index']);
    });
});

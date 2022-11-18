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
    return view('pages.demo-page.index');
});

Route::group(['prefix' => 'schools'], function() {
    Route::get('/', [\App\Http\Controllers\SchoolManageController::class, 'index']);
});

Route::group(['prefix' => 'users'], function() {
    Route::get('/', [\App\Http\Controllers\UserController::class, 'index']);
});

Route::group(['prefix' => 'videos'], function() {
    Route::get('/', [App\Http\Controllers\VideoManageController::class, 'index']);
});
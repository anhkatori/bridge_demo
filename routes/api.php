<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'auth'], function () {
    Route::post('/login', 'App\Http\Controllers\Api\AuthController@login');
    Route::post('/resetpassword', 'App\Http\Controllers\Api\AuthController@resetpassword');
    Route::post('/changepassword', 'App\Http\Controllers\Api\AuthController@changepassword');
    Route::get('/profile', 'App\Http\Controllers\Api\AccountController@profile');
    Route::get('/logout', 'App\Http\Controllers\Api\AuthController@logout');
});
Route::get('/subject', 'App\Http\Controllers\Api\SubjectController@list');
Route::group(['prefix' => 'training'], function () {
    Route::get('/get-question', 'App\Http\Controllers\Api\QuestionsController@get_question');
});
Route::group(['prefix' => 'admin'], function () {
    Route::group(['prefix' => 'schoolyear'], function () {
        Route::get('/list', 'App\Http\Controllers\Api\SchoolYearController@list');
        Route::post('/store', 'App\Http\Controllers\Api\SchoolYearController@store');
        Route::post('/show', 'App\Http\Controllers\Api\SchoolYearController@show');
        Route::put('/update', 'App\Http\Controllers\Api\SchoolYearController@update');
        Route::delete('/delete', 'App\Http\Controllers\Api\SchoolYearController@destroy');
    });
    Route::group(['prefix' => 'class'], function () {
        Route::get('/list', 'App\Http\Controllers\Api\ClassesController@list');
        Route::post('/listbyschool', 'App\Http\Controllers\Api\ClassesController@listbyschool');
        Route::post('/store', 'App\Http\Controllers\Api\ClassesController@store');
        Route::post('/show', 'App\Http\Controllers\Api\ClassesController@show');
        Route::put('/update', 'App\Http\Controllers\Api\ClassesController@update');
        Route::delete('/delete', 'App\Http\Controllers\Api\ClassesController@destroy');
    });
    Route::group(['prefix' => 'school'], function () {
        Route::get('/list', 'App\Http\Controllers\Api\SchoolsController@list');
        Route::post('/search', 'App\Http\Controllers\Api\SchoolsController@search');
        Route::post('/listbyschoolyear', 'App\Http\Controllers\Api\SchoolsController@listbyschoolyear');
        Route::post('/store', 'App\Http\Controllers\Api\SchoolsController@store');
        Route::post('/show', 'App\Http\Controllers\Api\SchoolsController@show');
        Route::put('/update', 'App\Http\Controllers\Api\SchoolsController@update');
        Route::delete('/delete', 'App\Http\Controllers\Api\SchoolsController@destroy');
    });
    Route::group(['prefix' => 'user'], function () {
        Route::get('/profile', 'App\Http\Controllers\Api\AccountController@list');
        Route::post('/search', 'App\Http\Controllers\Api\AccountController@search');
        Route::post('/store', 'App\Http\Controllers\Api\AccountController@store');
        Route::post('/show', 'App\Http\Controllers\Api\AccountController@show');
        Route::put('/update', 'App\Http\Controllers\Api\AccountController@update');
        Route::delete('/delete', 'App\Http\Controllers\Api\AccountController@destroy');
    });
});

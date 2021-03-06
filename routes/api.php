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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->namespace('Api')->group(function(){

    Route::name('real_estates.')->group(function(){

        Route::resource('real-estates', 'RealEstateController'); //api/v1/real-estates/
    });

    Route::name('users.')->group(function(){

        Route::resource('users', 'UserController');
    });

    Route::name('categories.')->group(function(){

        Route::resource('categories', 'CategoryController');
        Route::get('categories/{id}/real-estates', 'CategoryController@realEstates');
    });
});
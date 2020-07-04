<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Models
use \App\Event;
use \App\User;


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


Route::group(['prefix' => 'users/register'], function () {
    Route::get('teste', [\App\Http\Controllers\Auth\RegisterController::class, 'teste']);
    Route::post('', [\App\Http\Controllers\Auth\RegisterController::class, 'create']);
});

Route::post('login', 'Auth\LoginController@login');


Route::middleware('auth:api')->group(function () {
    Route::get('/user/events', function(Request $request) {
        return $request->user()->events()->get();
    });
});

Route::get('/events', function(Request $request) {
    return Event::with('eventCategory')->get();
});

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


Route::get('/search', 'HomeController@search');

Route::group([

    'prefix' => 'auth'

], function () {

    Route::post('register', 'AuthController@register');
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

});

Route::apiResource('/tasks' , 'TaskController');

Route::group(['prefix' => '/tasks'], function (){

    Route::put ('/{task}/setstatus' , 'TaskController@setStatus');
    Route::put ('/{task}/setvisibility' , 'TaskController@setVisibility');
    Route::put('/{task}/setdeadline', 'TaskController@setDeadline');
    Route::post('/{task}/uploadfiles', 'FileController@upload');
    
});

Route::get('/user/{user}', 'UserController@show')->name('users.show');
<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function() {
    return view('welcome');
});

Route::group(['middleware' => 'auth' ], function () {

    Route::group(['prefix' => 'republica', 'as' => 'republic.'], function () {
        Route::get('/', ['as' => 'index', 'uses' => 'RepublicController@index']);
        Route::get('/nova', ['as' => 'create', 'uses' => 'RepublicController@create']);
        Route::post('/salvar', ['as' => 'store', 'uses' => 'RepublicController@store']);
    });
    Route::get('/{republicId}/dashboard', ['as' => 'republic.dashboard', 'uses' => 'RepublicController@dashboard']);

    Route::group(['prefix' => '{republicId}/quartos', 'as' => 'room.'], function () {
        Route::get('', ['as' => 'index', 'uses' => 'RoomController@index']);
        Route::get('/salvar', ['as' => 'store', 'uses' => 'RoomController@store']);
        Route::get('/{roomId}/editar', ['as' => 'edit', 'uses' => 'RoomController@edit']);
        Route::put('/{roomId}/alterar', ['as' => 'update', 'uses' => 'RoomController@update']);
    });

    Route::group(['prefix' => '{republicId}/contas', 'as' => 'bill.'], function () {
        Route::group(['prefix' => 'tipos', 'as' => 'type.' ], function () {
            Route::get('', ['as' => 'index', 'uses' => 'BillTypeController@index']);
            Route::get('/criar', ['as' => 'create', 'uses' => 'BillTypeController@create']);
            Route::post('/salvar', ['as' => 'store', 'uses' => 'BillTypeController@store']);
            Route::delete('/{typeId}/deletar', ['as' => 'delete', 'uses' => 'BillTypeController@destroy']);
        });
    });
});

Route::get('social/login/{provider}', ['as' => 'social_login', 'uses' => 'Auth\AuthController@redirectToProvider']);
Route::get('social/login/{provider}/callback', 'Auth\AuthController@handleProviderCallback');

Route::get('auth/login', ['as' => 'login-form', 'uses' => 'Auth\AuthController@getLogin']);
Route::post('auth/login', ['as' => 'login', 'uses' => 'Auth\AuthController@postLogin']);
Route::get('auth/logout', ['as' => 'logout', 'uses' => 'Auth\AuthController@getLogout']);

// Registration routes...
Route::get('auth/register', ['as' => 'register-form', 'uses' => 'Auth\AuthController@getRegister']);
Route::post('auth/register', ['as' => 'register', 'uses' => 'Auth\AuthController@postRegister']);

//============================= Images Route =================================
Route::get('/images/{folder}/{image?}/{size?}', ['as' => 'images', 'uses' => function($folder, $image, $size) {
    $path = storage_path() . '/app/' . $folder . '/' . $image;
    $img = Image::make($path)->resize(null, $size, function ($constraint) {
        $constraint->aspectRatio();
    });

    return $img->response();
}]);
//=======================================================================

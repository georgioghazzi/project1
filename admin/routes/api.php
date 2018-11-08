<?php



Route::group([
    'middleware' => 'api',
], function () {

    Route::post('login', 'AuthController@login');
    Route::post('register', 'AuthController@register');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@getUser');
    Route::get('recipes','HomeController@index');
    Route::get('recipes/{id}','HomeController@searchByID');
    Route::post('order','HomeController@addOrder');

});

<?php

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

Route::get('/','HomeController@index', function () {
    return view('front/home');
});




Auth::routes();

Route::get('/home', 'HomeController@index')->name('front.home');
Route::prefix('admin')->group(function(){
    Route::get('/login','Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login','Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
    Route::get('/recipes','AdminController@Recipes')->name('admin.recipes');
    Route::get('/orders','AdminController@orders')->name('admin.orders');
    Route::get('/users','AdminController@users')->name('admin.users');
    Route::get('/adduser','AdminController@addUser')->name('admin.adduser');
    Route::post('/adduser','AdminController@postaddUser')->name('admin.user.add');
    Route::get('/addrecipe','AdminController@AddRecipe')->name('admin.addRecipe');
    Route::post('/addrecipe','AdminController@postAddRecipe')->name('admin.add.Recipe');
});

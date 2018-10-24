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
})->name('home');
Route::get('/add-to-cart/{id}','HomeController@getAddtoCart')->name('add.to.cart');
Route::get('/shopping-cart','HomeController@getCart')->name('shoping.cart');
Route::get('/checkout','HomeController@checkout')->name('checkout')->middleware('auth');
Route::get('/guest_checkout','HomeController@guestCheckout')->name('guestCheckout');
Route::post('/checkout','HomeController@postCheckout')->name('postCheckout');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('front.home');
Route::prefix('admin')->group(function(){
    Route::get('/login','Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login','Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
    Route::get('/recipes','AdminController@Recipes')->name('admin.recipes')->middleware('role:chef,admin');
    Route::get('/orders','AdminController@orders')->name('admin.orders')->middleware('role:staff,admin');
    Route::get('/users','AdminController@users')->name('admin.users')->middleware('role:admin');
    Route::get('/adduser','AdminController@addUser')->name('admin.adduser')->middleware('role:admin');
    Route::post('/adduser','AdminController@postaddUser')->name('admin.user.add')->middleware('role:admin');
    Route::get('/addrecipe','AdminController@AddRecipe')->name('admin.addRecipe')->middleware('role:chef,admin');
    Route::post('/addrecipe','AdminController@postAddRecipe')->name('admin.add.Recipe')->middleware('role:chef,admin');
    Route::get('/forbiden','AdminController@forbiden')->name('admin.forbiden');
});

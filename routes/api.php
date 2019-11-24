<?php

use Illuminate\Http\Request;

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
Route::namespace("Api")->group(function () {

    // Route::post('/attempt', 'AuthController@attempt')->name('web.auth.attempt');
    // Route::get('/logout', 'AuthController@logout')->name('web.auth.logout');
    // Route::get('/login', 'AuthController@login')->name('web.auth.login');
    // Route::get('/register', 'AuthController@register')->name('web.auth.register');
    // Route::post('/register', 'AuthController@registerAction')->name('web.auth.register');
    // Route::get('/password/reset', 'AuthController@reset')->name('password.reset');
    // Route::post('/password/reset', 'AuthController@sendReset')->name('web.auth.reset.send');
    // Route::post('/password/reset/confirm', 'AuthController@resetPassword')->name('web.auth.reset.confirm');

    /////////////////// categories /////////////

    Route::get('categories/{category}/Products','CategoriesController@products');

    Route::resource('categories','CategoriesController');

    ///////////////// products /////////////////
   
    Route::resource('products','ProductsController');

    /////////////////// orders /////////////////
    
    Route::get('orders','OrdersController@index');
    Route::get('orders/{order}','OrdersController@show');
    Route::get('phone/orders','OrdersController@phoneOrders');
    Route::post('orders/store','OrdersController@store');
    Route::post('orders/{order}/cancel','OrdersController@orderCancel');

    Route::resource("coupons", "CouponsController");
});    


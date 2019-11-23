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

    Route::get('categories','CategoriesController@index');
    Route::get('categories/{category}','CategoriesController@show');
    Route::get('category/{category}/Products','CategoriesController@products');
    Route::post('category/store','CategoriesController@store');
    Route::PUT('category/{category}/update','CategoriesController@update');
    Route::delete('category/{category}/destroy','CategoriesController@destroy');

    ///////////////// products /////////////////
    Route::get('/products','ProductsController@index');
    Route::get('/products/{product}','ProductsController@show');
    Route::POST('products/store','ProductsController@store');
    Route::DELETE('/products/{product}/destroy','ProductsController@destroy');
    Route::PUT('/products/{product}/update','ProductsController@update');

    /////////////////// orders /////////////////
    
    Route::get('orders','OrdersController@index');
    Route::get('orders/{order}','OrdersController@show');
    Route::get('phone/orders','OrdersController@phoneOrders');
    Route::post('orders/store','OrdersController@store');
    Route::post('orders/{order}/cancel','OrdersController@orderCancel');

});    





// {
//     "en[name]":"btngan",
//     "ar[name]":"بتنجان" ,
//     "en[description]":"mahshy" ,
//     "ar[description]":"محشى لزيز",
//     "price":"300" ,
//     "category_id":"1"     
//   }
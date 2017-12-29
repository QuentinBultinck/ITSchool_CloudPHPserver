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

Route::get("/", function () {
    return redirect("home");
});
Route::get("/home", 'HomeController@index')->name("home");
Route::post("/search", 'HomeController@searchRestaurants')->name("search");

Route::get("/restaurants/myRestaurant", 'RestaurantsController@create')->name("myRestaurant");
Route::post("/restaurants/store", 'RestaurantsController@store')->name("storeRestaurant");
Route::patch("/restaurants/update", 'RestaurantsController@update')->name("updateRestaurant");

Auth::routes();
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

Route::post('storeProduct', 'ProductController@store');
Route::get('getProducts', 'ProductController@index');
Route::post('updateProduct/{id}', 'ProductController@update');
Route::get('showProduct/{id}', 'ProductController@show');
Route::post('deleteProduct/{id}', 'ProductController@destroy');

Route::post('storeRole', 'RoleController@store');
Route::get('getRoles', 'RoleController@index');
Route::post('updateRole/{id}', 'RoleController@update');
Route::get('showRole/{id}', 'RoleController@show');
Route::post('deleteRole/{id}', 'RoleController@destroy');

Route::post('storeCategory', 'CategoryController@store');
Route::get('getCategories', 'CategoryController@index');
Route::post('updateCategory/{id}', 'CategoryController@update');
Route::get('showCategory/{id}', 'CategoryController@show');
Route::post('deleteCategory/{id}', 'CategoryController@destroy');

Route::post('storeOrder', 'OrderController@store');
Route::get('getOrders', 'OrderController@index');
Route::post('updateOrder/{id}', 'OrderController@update');
Route::get('showOrder/{id}', 'OrderController@show');
Route::post('deleteOrder/{id}', 'OrderController@destroy');

Route::post('storeUser', 'UserController@store');
Route::get('getUsers', 'UserController@index');
Route::post('updatUser/{id}', 'UserController@update');
Route::get('showUser/{id}', 'UserController@show');
Route::post('deleteUser/{id}', 'UserController@destroy');

Route::any('{path?}', 'MainController@index')->where("path", ".+");

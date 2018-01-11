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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', function () {
    return view('admin/index');
});

//Route::resource('admin', 'AdminController');

Route::any('admin/adminCreate','Admin\AdminController@create');
Route::any('admin/adminIndex','Admin\AdminController@index');

Route::any('admin/postIndex','Admin\PositionController@index');
Route::any('admin/postCreate','Admin\PositionController@create');

Route::any('admin/filialeIndex','Admin\FilialeController@index');

Route::any('admin/cityIndex','Admin\CityController@index');

Route::any('admin/regionIndex','Admin\RegionController@index');

Route::any('admin/getProvince','Admin\AdminController@getProvince');


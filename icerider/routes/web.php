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

Route::any('admin/regionAdd','Admin\RegionController@add');
Route::any('admin/regionDel','Admin\RegionController@del');
Route::any('admin/regionUpd','Admin\RegionController@upd');
Route::any('admin/regionUpdate','Admin\RegionController@update');

Route::any('admin/filialeAdd','Admin\FilialeController@add');
Route::any('admin/filialeDel','Admin\FilialeController@del');
Route::any('admin/filialeUpd','Admin\FilialeController@upd');
Route::any('admin/filialeUpdate','Admin\FilialeController@update');

Route::any('admin/positionAdd','Admin\PositionController@add');
Route::any('admin/positionDel','Admin\PositionController@del');
Route::any('admin/positionUpd','Admin\PositionController@upd');
Route::any('admin/positionUpdate','Admin\PositionController@update');
Route::any('admin/positionAuth','Admin\PositionController@auth');

Route::any('admin/adminAdd','Admin\AdminController@add');
Route::any('admin/adminDel','Admin\AdminController@del');
Route::any('admin/adminUpd','Admin\AdminController@upd');
Route::any('admin/adminUpdate','Admin\AdminController@update');
Route::any('admin/adminEditStatus','Admin\AdminController@editStatus');

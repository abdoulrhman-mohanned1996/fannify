<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::delete('saveworkerr/{id}', 'PassportController@delete');
Route::post('updateisactive/{id}', 'PassportController@updateisactive');
Route::post('saveworker', 'PassportController@saveworker');
Route::post('saveworker/{id}', 'PassportController@update');
Route::get('subservice/{id}', 'SubserviceController@index');
Route::post('uploadimage', 'SubserviceController@uploadim');
Route::get('getherfa', 'PassportController@getherfa');
Route::get('getsubservices', 'SubserviceController@getsubservices');
Route::post('subservice', 'SubserviceController@store');
Route::post('subservice/{id}', 'SubserviceController@update');
Route::delete('subservicee/{id}', 'SubserviceController@delete');
Route::get('subservicesusers/{id}/{ids}', 'PassportController@whereusers');

Route::post('slideshow/{id}', 'slideshowController@update');
Route::post('slideshow', 'slideshowController@store');
Route::get('slideshow', 'slideshowController@index');
Route::delete('slideshow/{id}', 'slideshowController@delete');


Route::delete('subservice/{id}', 'OrderrController@delete');
Route::get('getorders', 'OrderrController@index');
Route::get('getworkerorders/{id}', 'OrderrController@whereuser');


Route::get('allsubcats', 'SubserviceController@index');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('ordersave', 'OrderrController@storeorder');

Route::post('login', 'PassportController@login');
Route::post('signup', 'PassportController@register');

// Product
Route::resource('product', 'ProductCtrl');
Route::get('mproduct', 'ProductCtrl@mproduct');

Route::get('mproduct/search/{q}', 'ProductCtrl@mproduct');

Route::post('updatepro/{id}', 'ProductCtrl@update');
Route::post('deletepro/{id}', 'ProductCtrl@delete');
// end

// Brand

Route::get('mbrand/product/{id}', 'BrandController@mwhereproduct');

Route::get('brand/product/{id}', 'BrandController@whereproduct');

Route::post('brand/', 'BrandController@store');
Route::post('brand/{id}', 'BrandController@update');
Route::delete('brand/{id}', 'BrandController@delete');
// end

Route::post('updatetotalprice/{id}', 'OrderrController@updatetotalprice');
Route::post('orderupdate/{id}', 'OrderrController@update');
Route::get('acceptedorders/{id}', 'OrderrController@acceptedorders');
Route::get('doneorders/{id}', 'OrderrController@doneorders');
// Drug Store
Route::get('drugstores', 'DsController@index');
Route::post('drugstores/', 'DsController@store');
Route::post('drugstores/{id}', 'DsController@update');

// Store product

Route::post('storeprd', 'DsController@storeproduct');
Route::post('storeprd/{id}', 'DsController@updateproduct');
Route::get('storeprd/brand/{id}', 'DsController@wherebrand');

Route::get('mstoreprd/product/{id}', 'DsController@mwhereds');

Route::get('mstoreprd/product/{id}/filter/{brands}', 'DsController@mwheredsfilter');




// end


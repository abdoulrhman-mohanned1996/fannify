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
Auth::routes();
Route::get('/', function () {
    return view('category');
})->middleware('auth');

Route::get('/category', function () {
    return view('category');
})->middleware('auth');


Route::get('/category', function () {
    return view('category');
})->middleware('auth');

Route::get('/items', function () {
    return view('item');
})->middleware('auth');

Route::get('/jobs', function () {
    return view('jobs');
})->middleware('auth');

Route::get('/reqjob', function () {
    return view('reqjob');
})->middleware('auth');

Route::get('/slideshow', function () {
    return view('slideshow');
})->middleware('auth');
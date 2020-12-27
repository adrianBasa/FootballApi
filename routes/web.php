<?php

use Illuminate\Support\Facades\Route;

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
 //   return view('welcome');
//});

Route::get('/','App\Http\Controllers\ApiController@list');
Route::get('/matches/{id}','App\Http\Controllers\ApiController@showbyid');
Route::get('/premier-league','App\Http\Controllers\ApiController@showPremierLeague');
Route::get('/serie-a','App\Http\Controllers\ApiController@showSeriaA'); 
Route::get('/la-liga','App\Http\Controllers\ApiController@showLaLiga');
Route::get('/bundesliga','App\Http\Controllers\ApiController@showBundesliga');
Route::get('/table','App\Http\Controllers\ApiController@showtable');






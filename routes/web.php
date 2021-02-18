<?php

use Illuminate\Support\Facades\Route;

Route::get('/','App\Http\Controllers\ApiController@list');
Route::get('/hightlightvideo/{id}','App\Http\Controllers\ApiController@showbyid');
Route::get('/showLeague','App\Http\Controllers\ApiController@showLeague');








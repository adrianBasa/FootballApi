<?php

use Illuminate\Support\Facades\Route;

Route::get('/','App\Http\Controllers\ApiController@list');
Route::get('/matches/{id}','App\Http\Controllers\ApiController@showbyid');
Route::get('/showLeague','App\Http\Controllers\ApiController@showLeague');








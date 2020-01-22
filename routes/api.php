<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'grade'], function() {
    Route::get('', 'GradeController@index');
});

Route::group(['prefix' => 'route'], function() {
    Route::get('', 'RouteController@index');
    Route::get('{route}', 'RouteController@show');
});

Route::group(['prefix' => 'attempt'], function() {
    Route::post('{route}', 'AttemptController@store');
    Route::delete('{attempt}', 'AttemptController@delete');
});
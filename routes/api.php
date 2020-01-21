<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'grade'], function() {
    Route::get('', 'GradeController@index');
});

Route::group(['prefix' => 'route'], function() {
    Route::get('', 'RouteController@index');
});
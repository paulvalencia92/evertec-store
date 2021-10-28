<?php

use Illuminate\Support\Facades\Route;

Auth::routes(['register' => false]);

Route::get('/', function () {
    return "pronto";
});



Route::get('/home', 'HomeController@index')->name('home');

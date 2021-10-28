<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Auth::routes(['register' => false]);

Route::get('/', function () {
    return "pronto";
});

Route::get('products', [ProductController::class, 'index'])->name('products.index');


Route::get('/home', 'HomeController@index')->name('home');

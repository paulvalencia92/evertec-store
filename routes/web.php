<?php

use App\Http\Controllers\{ProductController, OrderController};
use Illuminate\Support\Facades\Route;

Auth::routes(['register' => false]);

Route::get('/', function () {
    return redirect()->route('products.index');
});

/**=================================
 *    PRODUCTOS
 *================================**/
Route::get('products', [ProductController::class, 'index'])->name('products.index');


/**=================================
 *    ORDENES
 *================================**/
Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');


Route::get('/home', 'HomeController@index')->name('home');

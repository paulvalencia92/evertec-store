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

Route::get('/my-orders', [OrderController::class, 'getMyOrders'])->name('orders.owner');
Route::post('/search-orders', [OrderController::class, 'search'])->name('orders.search');

Route::post('/orders/{order}/pay', [OrderController::class, 'payOrder'])->name('orders.pay');
Route::get('/orders/{code}/payed', [OrderController::class, 'acceptOrder'])->name('orders.payed');

Route::get('/home', 'HomeController@index')->name('home');

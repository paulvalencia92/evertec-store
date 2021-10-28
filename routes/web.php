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
Route::post('products', [ProductController::class, 'store'])->name('products.store');
Route::delete('products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
Route::post('products/update', [ProductController::class, 'update'])->name('products.update');


/**=================================
 *    ORDENES
 *================================**/
Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');

Route::get('/my-orders', [OrderController::class, 'getMyOrders'])->name('orders.owner');
Route::post('/search-orders', [OrderController::class, 'search'])->name('orders.search');

Route::post('/orders/{order}/pay', [OrderController::class, 'payOrder'])->name('orders.pay');
Route::get('/orders/{code}/payed', [OrderController::class, 'acceptOrder'])->name('orders.payed');
Route::get('/orders/{code}/reject', [OrderController::class, 'rejectOrder'])->name('orders.reject');

/**=================================
 *    ORDENES ADMIN
 *================================**/
Route::get('/orders', [OrderController::class, 'index'])->name('orders.index')->middleware('auth');
Route::post('/orders/{order}/dispatch', [OrderController::class, 'dispatchOrder'])->name('orders.dispatch');

Route::get('/home', 'HomeController@index')->name('home');

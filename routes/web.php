<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return to_route("login");
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');

Route::resource('customer',Controllers\CustomerController::class);

Route::resource('category', Controllers\CategoryController::class);

Route::resource('order', Controllers\OrderController::class);

Route::get('/customer/{customer}/createOrder', [Controllers\OrderController::class, 'create'])->name('customer-order.create');
Route::post('/customer/{customer}/storeOrder', [Controllers\OrderController::class, 'store'])->name('customer-order.store');


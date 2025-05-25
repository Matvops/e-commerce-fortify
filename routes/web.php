<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

Route::middleware("auth")->group(function(){
    Route::get('/account', [OrderController::class, 'getOrders'])->name('account');
    Route::get('/cart', [CartController::class, "getCart"])->name("cart");
    Route::delete('/deleteProductCart', [CartController::class, 'removeProductCart'])->name('product-cart.remove');
    Route::post('/addProductOnCart', [CartController::class, 'addProductOnCart'])->name('product-cart.add');
    Route::post('/makeOrder', [OrderController::class, 'makeOrder'])->name('order.make');
});

Route::get('/', [MainController::class, 'home'])->name('home');
Route::view('/about', 'about')->name('about');

    
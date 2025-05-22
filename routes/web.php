<?php

use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

Route::middleware("auth")->group(function(){
    Route::get('/account', [MainController::class, 'getOrders'])->name('account');
    Route::get('/cart', [MainController::class, "getCart"])->name("cart");
    Route::delete('/deleteProductCart', [MainController::class, 'removeProductCart'])->name('product-cart.remove');
    Route::post('/addProductOnCart', [MainController::class, 'addProductOnCart'])->name('product-cart.add');
    Route::post('/makeOrder', [MainController::class, 'makeOrder'])->name('order.make');
});

Route::get('/', [MainController::class, 'home'])->name('home');
Route::view('/about', 'about')->name('about');

    
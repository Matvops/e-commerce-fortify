<?php

use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

Route::middleware("auth")->group(function(){
    Route::view('/account', 'account')->name('account');
});

Route::get('/', [MainController::class, 'home'])->name('home');
Route::view('/about', 'about')->name('about');

    
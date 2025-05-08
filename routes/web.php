<?php

use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

Route::middleware("auth")->group(function(){
    Route::get('/', [MainController::class, 'home'])->name('home');
});

    
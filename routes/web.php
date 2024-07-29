<?php

use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;

Route::get('/', [CartController::class,"allItems"]);

Route::prefix('/cart')->name('.basket')->group(function(){
    Route::get('/all',[CartController::class,'allItems']);
});
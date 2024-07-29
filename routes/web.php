<?php

use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;


Route::prefix('cart')->name('.cart')->group(function(){
    Route::get('/all',[CartController::class,'allItems']);
    Route::get('/{productId}',[CartController::class,'get']);
    Route::post('/add/{productId}',[CartController::class,'add']);
    Route::post('/update/{productId}',[CartController::class,'update']);
    Route::get('/destroy',[CartController::class,'destroy']);
    Route::get('/total',[CartController::class,'total']);
    Route::get('/tax',[CartController::class,'tax']);
    Route::post('/create/tax',[CartController::class,'setTax']);
    Route::get('/tax',[CartController::class,'tax']);
    Route::get('/subTotal',[CartController::class,'subTotal']);
    Route::get('/count',[CartController::class,'count']);
    Route::get('/delete/{productId}',[CartController::class,'delete']);

});
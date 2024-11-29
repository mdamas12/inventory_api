<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\ProductController;


Route::post('auth/register', [AuthController::class, 'register']);
Route::post('auth/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function(){
     Route::resource('categories', CategoryController::class);
     Route::resource('features', FeatureController::class);
     Route::resource('products', ProductController::class);
     Route::patch('products/updatestock/{id}',[ProductController::class, 'update_stock']);
     Route::get('products/listdetail/{id}',[DetailProductController::class, 'listDetail']);
     Route::post('products/createdetail',[DetailProductController::class, 'createDetail']);
     Route::put('products/updatedetail/{id}',[DetailProductController::class, 'updateDetail']);
     Route::delete('products/deletedetail/{id}',[DetailProductController::class, 'destroyDetail']);

    Route::get('auth/logout', [AuthController::class, 'logout']);
});




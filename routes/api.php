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
    //Route::post('plans/addmodule',[PlanDetailController::class, 'addModuleToplan']);
    //Route::get('plans/listmodules/{plan}',[PlanDetailController::class, 'listModuleToplan']);
    //Route::delete('plans/deletemodules/{plan}',[PlanDetailController::class, 'deleteModuleToplan']);
    Route::get('auth/logout', [AuthController::class, 'logout']);
});




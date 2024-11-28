<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;


Route::post('auth/register', [AuthController::class, 'register']);
Route::post('auth/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function(){
    // Route::resource('plans', PlanController::class);
    // Route::resource('modules', ModuleController::class);
   // Route::post('plans/addmodule',[PlanDetailController::class, 'addModuleToplan']);
    //Route::get('plans/listmodules/{plan}',[PlanDetailController::class, 'listModuleToplan']);
   // Route::delete('plans/deletemodules/{plan}',[PlanDetailController::class, 'deleteModuleToplan']);
   // Route::get('auth/logout', [AuthController::class, 'logout']);
});




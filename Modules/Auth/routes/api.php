<?php

use Illuminate\Support\Facades\Route;
use Modules\Auth\Http\Controllers\AuthController;


/*
 *--------------------------------------------------------------------------
 * API Routes
 *--------------------------------------------------------------------------
 *
 * Here is where you can register API routes for your application. These
 * routes are loaded by the RouteServiceProvider within a group which
 * is assigned the "api" middleware group. Enjoy building your API!
 *
*/

// Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
//     Route::apiResource('auth', AuthController::class)->names('auth');
// });
Route::post('registerStudent',[AuthController::class,'registerStudent']);
Route::post('loginStudent',[AuthController::class,'loginStudent']);
Route::middleware('auth:sanctum')->post('registerTeacher',[AuthController::class,'registerTeacher']);
Route::post('loginTeacher',[AuthController::class,'loginTeacher']);
Route::middleware('auth:sanctum')->post('registerAdmin',[AuthController::class,'registerAdmin']);
Route::post('loginAdmin',[AuthController::class,'loginAdmin']);
Route::middleware('auth:sanctum')->get('logout',[AuthController::class,'logout']);
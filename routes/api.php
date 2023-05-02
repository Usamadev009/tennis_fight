<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('signup',[AuthController::class, 'signup']);
Route::post('signin',[AuthController::class, 'signin']);

Route::post('send-otp', [AuthController::class, 'sendOtp']);
Route::post('verify-otp', [AuthController::class, 'verifyOtp']);
Route::post('reset-password', [AuthController::class, 'resetPassword']);

Route::group(['middleware' => 'auth:sanctum'], function(){
    Route::get('logout',[AuthController::class, 'logout']);

    Route::get('users/profile',[AuthController::class, 'profile']);
});

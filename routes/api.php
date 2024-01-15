<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\Auth\ApiAuthController;
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

 // Token Creation (Login) Route
 Route::post('/create-token', [ApiAuthController::class, 'createToken']);
 // Token Revocation (Logout) Route
 Route::post('/revoke-token', [ApiAuthController::class, 'revokeToken']);


Route::middleware(['auth:sanctum'])->group(function () {
       
    // Task Routes
    Route::resource('tasks', TaskController::class);
    // Payment Routes
    Route::resource('payments', PaymentController::class);
    Route::post('payments/{payment}/verify', [PaymentController::class, 'verifyPayment']);
    Route::get('payments/{payment}/status', [PaymentController::class, 'getPaymentStatus']);
});
 // Task Routes
//  Route::resource('tasks', TaskController::class);
//  // Payment Routes
//  Route::resource('payments', PaymentController::class);
//  Route::post('payments/{payment}/verify', [PaymentController::class, 'verifyPayment']);
//  Route::get('payments/{payment}/status', [PaymentController::class, 'getPaymentStatus']);
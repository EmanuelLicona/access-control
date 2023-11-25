<?php

use App\Http\Controllers\Api\AccessController;
use App\Http\Controllers\Api\ApiUserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


// Route::get('/users', [ApiUserController::class, 'index']);

Route::group(['middleware' => 'verifySecretKey'], function () {
    // Route::get('/users', [ApiUserController::class, 'index']);
    Route::post('/access', [AccessController::class, 'store']);
});

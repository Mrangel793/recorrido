<?php


use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CompanyController;
use App\Http\Controllers\Api\MediaController;
use App\Http\Controllers\Api\StandController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:api');

Route::prefix('auth')->group(function () {
    Route::post('login', [App\Http\Controllers\Api\AuthController::class, 'login']);
    Route::post('/register', [App\Http\Controllers\Api\AuthController::class, 'register']);
});

Route::apiResource('/companies', App\Http\Controllers\Api\CompanyController::class);

Route::apiResource('/media', App\Http\Controllers\Api\MediaController::class);

Route::apiResource('/stand', App\Http\Controllers\Api\StandController::class);




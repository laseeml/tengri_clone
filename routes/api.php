<?php

use App\Http\Controllers\NewsController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', [UserController::class, 'login']);
Route::post('logout', [UserController::class, 'logout'])->middleware('auth:api');

Route::prefix('news')->group(function (): void {
    Route::get('', [NewsController::class, 'index']);
    Route::get('{news}', [NewsController::class, 'show']);
    Route::post('', [NewsController::class, 'create']);
    Route::put('{news}', [NewsController::class, 'update']);
    Route::delete('{news}', [NewsController::class, 'delete']);

    Route::prefix('find')->group(function (): void {
        Route::post('', [NewsController::class, 'find']);
    });
});

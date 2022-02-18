<?php

use App\Http\Controllers\Sanctum\AuthorizationController;
use App\Http\Controllers\Sanctum\ExchangeController;
use App\Http\Controllers\Sanctum\TrendController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::post('/register',[SanctumAuthController::class,'register'])->name('api.auth.register');
Route::post('/login',[AuthorizationController::class,'login'])->name('api.auth.login');

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/profile', [AuthorizationController::class,'profile',])->name('api.auth.me');
    Route::post('/logout', [AuthorizationController::class,'destroy',])->name('api.auth.logout');

    Route::prefix('/exchange')->group(function () {
        Route::get('/get', [ExchangeController::class, 'get'])->name('api.exchange.get');
    });

    Route::prefix('/trend')->group(function () {
        Route::get('/get', [TrendController::class, 'get'])->name('api.trend.get');
        Route::post('/create', [TrendController::class, 'store'])->name('api.trend.create');
        Route::post('/timeframe', [TrendController::class, 'store_timeframe'])->name('api.trend.create_timeframe');
        Route::get('/{trend}/show', [TrendController::class, 'show'])->name('api.trend.show');
        Route::put('/{trend}/update', [TrendController::class, 'update'])->name('api.trend.update');
        Route::delete('/{trend}/delete', [TrendController::class, 'destroy'])->name('api.trend.destroy');
    });

    Route::prefix('/order')->group(function () {
        Route::get('/get', [TrendController::class, 'get'])->name('api.order.get');
        Route::post('/create', [TrendController::class, 'store'])->name('api.order.create');
        Route::get('/{trend}/show', [TrendController::class, 'show'])->name('api.order.show');
        Route::put('/{trend}/update', [TrendController::class, 'update'])->name('api.order.update');
        Route::delete('/{trend}/delete', [TrendController::class, 'destroy'])->name('api.order.destroy');
    });
});

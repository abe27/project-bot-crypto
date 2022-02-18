<?php

use App\Http\Controllers\SanctumAuthController;
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
Route::post('/login',[SanctumAuthController::class,'login'])->name('api.auth.login');

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/profile', [SanctumAuthController::class,'profile',])->name('api.auth.me');
    Route::post('/logout', [SanctumAuthController::class,'destroy',])->name('api.auth.logout');


});

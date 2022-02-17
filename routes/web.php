<?php

use App\Http\Controllers\ApiExchangeController;
use App\Http\Controllers\DashBoardController;
use App\Http\Controllers\HelpCenterController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TrackingInvestmentController;
use App\Http\Controllers\TrendController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth', 'verified'])->group(function() {
    Route::get('/dashboard/index', [DashBoardController::class, 'index'])->name('dashboard.index');
    Route::get('/trend/index', [TrendController::class, 'index'])->name('trend.index');// trend.index
    Route::get('/tracking/index', [TrackingInvestmentController::class, 'index'])->name('tracking-investment.index');// tracking-investment
    Route::get('/api-data/index', [ApiExchangeController::class, 'index'])->name('api-data.index');
    Route::get('/help-center/index', [HelpCenterController::class, 'index'])->name('help-center.index');
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.me');
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';

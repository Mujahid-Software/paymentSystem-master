<?php

use App\Http\Controllers\MainController;
use App\Http\Middleware\SetLocale;
use Illuminate\Support\Facades\Route;

Route::middleware([SetLocale::class])->group(function () {
    
    Route::post('changeLocale', [MainController::class, 'changeLocale'])->name('changeLocale');

    Route::get('/', [MainController::class, 'home'])->name('home');
    Route::post('plan/{id}/subscribe', [MainController::class, 'subscribe'])->name('plan.subscribe');

    Route::prefix('dashboard')->name('dashboard.')->group(function () {
        require base_path('routes/dashboard.php');
    });
});

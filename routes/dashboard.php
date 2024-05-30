<?php


use App\Http\Middleware\IsAdmin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\MainController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Dashboard\LoginController;
use App\Http\Controllers\Dashboard\MarchantController;
use App\Http\Controllers\Dashboard\PaymentController;
use App\Http\Controllers\Dashboard\SubscriptionPlanController;
use App\Models\Marchant;

Route::middleware(IsAdmin::class)->group(function () {
    Route::get('/home', [MainController::class, 'index'])->name('index');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::resource('subscriptionPlans', SubscriptionPlanController::class);
    Route::resource('payments', PaymentController::class);
    Route::resource('marchants', MarchantController::class);
    Route::resource('users', UserController::class);
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('marchants', MarchantController::class);
});

Route::post('/marchants', [MarchantController::class, 'store'])->name('marchants.store');


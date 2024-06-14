<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TenantController;
use App\Http\Controllers\LandlordController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ActivationController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\LandlordDashboardController;
use App\Http\Controllers\TenantDashboardController;
use App\Http\Controllers\DashboardController;

// Home Dashboard route
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');
Route::get('/', function () {
    return view('welcome');
});



// Property routes
Route::resource('properties', PropertyController::class);

// Role routes
Route::resource('roles', RoleController::class);

// Tenant routes
Route::resource('tenants', TenantController::class);

// Landlord routes
Route::resource('landlords', LandlordController::class);

// Payment routes
Route::resource('payments', PaymentController::class);

// Authentication Routes...
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Registration Routes...
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.post');


// Dashboard route
Route::middleware(['auth'])->group(function () {
    Route::middleware(['role:admin'])->get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::middleware(['role:landlord'])->get('/landlord/dashboard', [LandlordDashboardController::class, 'index'])->name('landlord.dashboard');
    Route::middleware(['role:tenant'])->get('/tenant/dashboard', [TenantDashboardController::class, 'index'])->name('tenant.dashboard');
});

// Activation routes
Route::get('activation-pending', [ActivationController::class, 'pending'])->name('activation.pending');
Route::get('activate/{id}/{token}', [ActivationController::class, 'activate'])->name('activate');

// Password reset routes
Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');

// Email verification routes
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

// Route for testing email
Route::get('/send-test-email', [App\Http\Controllers\TestEmailController::class, 'sendTestEmail'])->name('test.email');


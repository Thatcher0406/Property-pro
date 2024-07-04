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
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\LandlordDashboardController;
use App\Http\Controllers\TenantDashboardController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\ActivationController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\ConfirmPasswordController;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\EmailVerificationRequest;

// Landing page route
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Authentication Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

// regitration routes
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register'])->name('register.post');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


// Email verification routes
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (Illuminate\Auth\Events\EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/activation-pending'); // Redirect to your activation pending page
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');


// Dashboard routes
//Auth::routes();

//Route::middleware(['auth', 'verified'])->group(function () {
   // Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    //Route::get('/landlord/dashboard', [LandlordDashboardController::class, 'index'])->name('landlord.dashboard');
    //Route::get('/tenant/dashboard', [TenantDashboardController::class, 'index'])->name('tenant.dashboard');
//});

// Route for confirming password
Route::get('/password/confirm', [ConfirmPasswordController::class, 'showConfirmForm'])->name('password.confirm');
Route::post('/password/confirm', [ConfirmPasswordController::class, 'confirm']);

// Routes for password reset
Route::middleware('guest')->group(function () {
    Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('/reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');
}); 


// Activation routes
Route::get('/activation-pending', [ActivationController::class, 'pending'])->name('activation.pending');
Route::get('activate/{id}/{token}', [ActivationController::class, 'activate'])->name('activate');

// Property routes
Route::middleware('auth')->resource('properties', PropertyController::class);

// Tenant routes
Route::middleware('auth')->resource('tenants', TenantController::class);

// Landlord routes
Route::middleware('auth')->resource('landlords', LandlordController::class);

// Payment routes
Route::middleware('auth')->resource('payments', PaymentController::class);

// Route for testing email
Route::get('/send-test-email', [App\Http\Controllers\TestEmailController::class, 'sendTestEmail'])->name('test.email');






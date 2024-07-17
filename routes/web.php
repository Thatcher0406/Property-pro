<?php

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TenantController;
use App\Http\Controllers\LandlordController;
use App\Http\Controllers\ApartmentController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\AdminDashboardController;
use App\Http\Controllers\Auth\LandlordDashboardController;
use App\Http\Controllers\Auth\TenantDashboardController;
use App\Http\Controllers\Auth\DashboardController;
use App\Http\Controllers\Auth\ActivationController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\ConfirmPasswordController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ApplicationController;
use Illuminate\Http\Request;
//use Illuminate\Auth\Events\EmailVerificationRequest;

// Landing page route
Route::get('/', function () {
    return view('welcome');
})->name('home');

// About page route
Route::get('/about', function () {
    return view('about');
})->name('about');

//Property-grid page route
Route::get('/property-grid', function () {
    return view('property-grid');
})->name('property-grid');

//Blog-grid page route
Route::get('/blog-grid', function () {
    return view('blog-grid');
})->name('blog-grid');

//Agents-grid page route
Route::get('/agents-grid', function () {
    return view('agents-grid');
})->name('agents-grid');

//Contact page route
Route::get('/contact', function () {
    return view('contact');
})->name('contact');

//Property1 page route
Route::get('/property1', function () {
    return view('property1');
})->name('property1');

//Property2 page route
Route::get('/property2', function () {
    return view('property2');
})->name('property2');

//Agent1 page route
Route::get('/agent1', function () {
    return view('agent1');
})->name('agent1');

//Agent2 page route
Route::get('/agent2', function () {
    return view('agent2');
})->name('agent2');

//Blog1 page route
Route::get('/blog1', function () {
    return view('blog1');
})->name('blog1');
// Authentication Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'attemptLogin'])->name('login.post');

// regitration routes
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register'])->name('register.post');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Dashboard routes
// Auth::routes();

// Route::middleware(['auth', 'verified'])->group(function () {
//    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
//     Route::get('/landlord/dashboard', [LandlordDashboardController::class, 'index'])->name('landlord.dashboard');
//     Route::get('/tenant/dashboard', [TenantDashboardController::class, 'index'])->name('tenant.dashboard');
// });

//Admin dashboard
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', 'App\Http\Controllers\AdminController@dashboard')->name('admin.dashboard');
    Route::resource('admin/tenants', TenantController::class);
    Route::resource('admin/landlords', LandlordController::class);
    Route::resource('admin/apartments', ApartmentController::class);
    Route::get('admin/reports', [AdminController::class, 'reports'])->name('admin.reports');
});

// Tenant dashboard

Route::middleware(['auth'])->group(function () {
    Route::get('/tenant/dashboard', [TenantController::class, 'index'])->name('tenant.dashboard');

    // View apartments and perform actions
    Route::get('/tenant/apartments', [TenantController::class, 'viewApartments'])->name('tenant.apartments.index');

    // Book appointment to view apartment
    Route::get('/tenant/apartments/{apartment}/book', [TenantController::class, 'bookAppointment'])->name('tenant.apartments.book');
    Route::post('/tenant/apartments/{apartment}/book', [TenantController::class, 'processBookAppointment'])->name('tenant.apartments.book.store');

    // Booking success
    Route::get('/tenant/booking/success', function () {
        return view('tenant.booking_success');
    })->name('booking.success');

    // Submit application to rent apartment
    Route::get('/tenant/apartments/{apartment}/apply', [TenantController::class, 'submitApplicationForm'])->name('tenant.apartments.apply');
    Route::post('/tenant/apartments/{apartment}/apply', [TenantController::class, 'processApplication'])->name('tenant.apartments.apply.store');

    Route::get('/application/success', [ApplicationController::class, 'success'])->name('application.success');

    
    // Maintenance requests
    Route::get('/tenant/maintenance-request', [TenantController::class, 'showMaintenanceRequestForm'])->name('tenant.maintenance.create');
    Route::post('/tenant/maintenance-request', [TenantController::class, 'submitMaintenanceRequest'])->name('tenant.maintenance.store');
    Route::get('/tenant/maintenance-request/success', function () {
        return view('tenant.maintenance_success');
    })->name('maintenance.request.success');

    // Feedback
    Route::get('/tenant/feedback', [TenantController::class, 'showFeedbackForm'])->name('tenant.feedback.create');
    Route::post('/tenant/feedback', [TenantController::class, 'giveFeedback'])->name('tenant.feedback.store');
    Route::get('/tenant/feedback/success', function () {
        return view('tenant.feedback_success');
    })->name('feedback.success');
});



// landlord dashboard

Route::middleware(['auth'])->group(function () {
    Route::get('/landlord/dashboard', [LandlordController::class, 'index'])->name('landlord.dashboard');

    Route::get('/landlord/applications', [LandlordController::class, 'viewApplications'])->name('landlord.applications');
    Route::post('/landlord/applications/{application}/approve', [LandlordController::class, 'approveApplication'])->name('landlord.applications.approve');
    Route::post('/landlord/applications/{application}/reject', [LandlordController::class, 'rejectApplication'])->name('landlord.applications.reject');

    Route::get('landlord/apartments', [LandlordController::class, 'manageApartments'])->name('landlord.apartments.index');
    Route::get('landlord/apartments/create', [LandlordController::class, 'createApartment'])->name('landlord.apartments.create');
    Route::post('landlord/apartments/store', [LandlordController::class, 'storeApartment'])->name('landlord.apartments.store');
    Route::get('landlord/apartments/{apartment}/edit', [LandlordController::class, 'editApartment'])->name('landlord.apartments.edit');
    Route::put('landlord/apartments/{apartment}', [LandlordController::class, 'updateApartment'])->name('landlord.apartments.update');
    Route::delete('landlord/apartments/{apartment}', [LandlordController::class, 'destroyApartment'])->name('landlord.apartments.destroy');

    Route::get('landlord/maintenance', [LandlordController::class, 'viewMaintenanceRequests'])->name('landlord.maintenance.view');
    Route::post('landlord/maintenance/{request}/respond', [LandlordController::class, 'respondMaintenanceRequest'])->name('landlord.maintenance.respond');

    Route::get('landlord/feedback', [LandlordController::class, 'viewFeedback'])->name('landlord.feedback.view');
    Route::post('landlord/feedback/{feedback}/respond', [LandlordController::class, 'respondFeedback'])->name('landlord.feedback.respond');

    Route::get('/landlord/bookings', [LandlordController::class, 'viewBookings'])->name('landlord.bookings');

    Route::get('/landlord/tenants', [LandlordController::class, 'viewTenants'])->name('landlord.tenants');
    Route::get('/landlord/tenants/{tenant}/rent-status', [LandlordController::class, 'viewTenantRentStatus'])->name('landlord.tenants.rent-status');
});




//payment routes
Route::get('/payments/create', [PaymentController::class, 'create'])->name('payments.create');
Route::post('/payments/initiate', [PaymentController::class, 'initiate'])->name('payments.initiate');
Route::post('/mpesa/callback', [PaymentController::class, 'handleCallback'])->name('mpesa.callback');
Route::get('/payments/success', [PaymentController::class, 'success'])->name('payments.success');
Route::get('/payments/error', [PaymentController::class, 'error'])->name('payments.error');


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
Auth::routes(['verify' => true]);

Route::get('/activation-pending', function () {
    return view('auth.activation-pending');
})->name('activation.pending');


Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/home'); // Redirect to home or wherever you want after verification
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/resend', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.resend');
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






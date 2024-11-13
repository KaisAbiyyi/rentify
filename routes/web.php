<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\UserManagementController;
use App\Http\Controllers\Admin\ApprovalController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\RentalController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\MaintenanceController;

// Authentication Routes
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

// User Profile
Route::middleware(['auth'])->group(function () {
    Route::get('profile', [UserProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [UserProfileController::class, 'update'])->name('profile.update');
});

// Admin Routes
Route::prefix('admin')->middleware(['auth', 'can:isAdmin'])->group(function () {
    Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::resource('users', UserManagementController::class);
    Route::get('approvals', [ApprovalController::class, 'index'])->name('admin.approvals.index');
    Route::post('approvals/{user}', [ApprovalController::class, 'approve'])->name('admin.approvals.approve');
});

// Vehicle Management Routes
Route::middleware(['auth', 'can:isAdmin'])->group(function () {
    Route::resource('vehicles', VehicleController::class); // CRUD untuk kendaraan
});

// Rental Routes (Accessible by all authenticated users)
Route::middleware(['auth'])->group(function () {
    Route::get('rentals', [RentalController::class, 'index'])->name('rentals.index');
    Route::get('rentals/create', [RentalController::class, 'create'])->name('rentals.create');
    Route::post('rentals', [RentalController::class, 'store'])->name('rentals.store');
    Route::get('rentals/{rental}', [RentalController::class, 'show'])->name('rentals.show');
});

// Payment Routes (Accessible by all authenticated users)
Route::middleware(['auth'])->group(function () {
    Route::get('payments', [PaymentController::class, 'index'])->name('payments.index');
    Route::get('payments/create', [PaymentController::class, 'create'])->name('payments.create');
    Route::post('payments', [PaymentController::class, 'store'])->name('payments.store');
    Route::get('payments/{payment}', [PaymentController::class, 'show'])->name('payments.show');
});

// Maintenance Routes (Accessible by admin only)
Route::prefix('maintenance')->middleware(['auth', 'can:isAdmin'])->group(function () {
    Route::get('/', [MaintenanceController::class, 'index'])->name('maintenance.index');
    Route::get('create', [MaintenanceController::class, 'create'])->name('maintenance.create');
    Route::post('/', [MaintenanceController::class, 'store'])->name('maintenance.store');
    Route::get('{maintenance}', [MaintenanceController::class, 'show'])->name('maintenance.show');
});

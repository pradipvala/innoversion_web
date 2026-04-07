<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;


Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
                ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
                ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('home_login_view', [AuthenticatedSessionController::class, 'create'])
                ->name('home_login_view');

    Route::post('home_login', [AuthenticatedSessionController::class, 'store'])->name('home_login');

    Route::get('home-forgot-password', [PasswordResetLinkController::class, 'create'])
                ->name('home.password.request');

    Route::post('home-forgot-password', [PasswordResetLinkController::class, 'store'])
                ->name('password.email_check');

    Route::get('home-reset-password/{token}', [NewPasswordController::class, 'create'])
                ->name('password.reset.home');

    Route::post('home-reset-password', [NewPasswordController::class, 'store'])
                ->name('password.store.home');
});

Route::middleware('auth')->group(function () {
    Route::get('verify-email', EmailVerificationPromptController::class)
                ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
                ->middleware(['signed', 'throttle:6,1'])
                ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware('throttle:6,1')
                ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->name('password.confirm_check');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update_check');

    Route::post('home_logout', [AuthenticatedSessionController::class, 'home_destroy'])
                ->name('home_logout');
});

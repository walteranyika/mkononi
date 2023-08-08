<?php

use App\Http\Controllers\MainAppController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ArtistController;
use App\Http\Controllers\Admin\LoanController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Admin\PermissionsController;
use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\RateController;

use App\Http\Controllers\Auth\ChangePasswordController;

use  Illuminate\Support\Facades\Auth;

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.',  'middleware' => ['auth']], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    // Permissions
    Route::delete('permissions/destroy', [PermissionsController::class, 'massDestroy'])->name('permissions.massDestroy');
    Route::resource('permissions', PermissionsController::class);

    // Roles
    Route::delete('roles/destroy', [RolesController::class, 'massDestroy'])->name('roles.massDestroy');
    Route::resource('roles', RolesController::class);

    // Users
    Route::delete('users/destroy ', [UsersController::class, 'massDestroy'])->name('users.massDestroy');
    Route::resource('users', UsersController::class);

    // Artist
    Route::delete('artists/destroy ', [ArtistController::class, 'massDestroy'])->name('artists.massDestroy');
    Route::resource('artists', ArtistController::class);

    // Loan
    Route::delete('loans/destroy ', [LoanController::class, 'massDestroy'])->name('loans.massDestroy');
    Route::resource('loans', LoanController::class);

    // Payment
    Route::delete('payments/destroy', [PaymentController::class, 'massDestroy'])->name('payments.massDestroy');
    Route::resource('payments', PaymentController::class);

    // Rate
    Route::delete('rates/destroy ', [RateController::class, 'massDestroy'])->name('rates.massDestroy');
    Route::resource('rates', RateController::class);
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'App\Http\Controllers\Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', [ChangePasswordController::class, 'edit'])->name('password.edit');
        Route::post('password', [ChangePasswordController::class, 'update'])->name('password.update');
        Route::post('profile', [ChangePasswordController::class, 'updateProfile'])->name('password.updateProfile');
        Route::post('profile/destroy', [ChangePasswordController::class, 'destroy'])->name('password.destroyProfile');
    }
});
Route::post('/4dbbcf85b5bd89d2b4e783f1c6bc17d3', [MainAppController::class, 'ussdRequestHandler'])
    ->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);;

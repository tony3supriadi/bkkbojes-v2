<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


/** Routes Admin */
Route::get('/bkk-admin', [App\Http\Controllers\Admin\AdminController::class, 'redirectTo']);
Route::get('/app', [App\Http\Controllers\Admin\AdminController::class, 'redirectTo']);
Route::get('/app/v1', [App\Http\Controllers\Admin\AdminController::class, 'redirectTo']);

/**
 * ------------------
 * Admin Routing
 * ------------------
 * */
Route::group([
    "prefix" => "/app/v1/bkk-admin",
    "as" => "admin."
], function () {

    Route::get("/login", [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('auth.login');
    Route::post("/login", [App\Http\Controllers\Admin\LoginController::class, 'login']);

    Route::group([
        "middleware" => ["auth", "authIsAdmin"]
    ], function () {

        Route::get("/", [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('index');
        Route::get("/dashboard", [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');

        // Setting
        Route::get("/pengaturan", [App\Http\Controllers\Admin\PengaturanController::class, 'index'])->name('pengaturan.index');
        Route::get("/pengaturan/{id}/ubah", [App\Http\Controllers\Admin\PengaturanController::class, 'edit'])->name('pengaturan.edit');
        Route::put("/pengaturan/{id}", [App\Http\Controllers\Admin\PengaturanController::class, 'update'])->name('pengaturan.update');
        Route::delete("/pengaturan/{id}", [App\Http\Controllers\Admin\PengaturanController::class, 'destroy'])->name('pengaturan.destroy');
        Route::delete("/pengaturan", [App\Http\Controllers\Admin\PengaturanController::class, 'bulk_destroy'])->name('pengaturan.bulk_destroy');
    });
});

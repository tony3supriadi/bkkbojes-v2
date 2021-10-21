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

        // User
        Route::get("/users", [App\Http\Controllers\Admin\UserController::class, 'index'])->name('users.index');
        Route::get("/users/tambah", [App\Http\Controllers\Admin\UserController::class, 'create'])->name('users.create');
        Route::post("/users", [App\Http\Controllers\Admin\UserController::class, 'store'])->name('users.store');
        Route::get("/users/{id}/ubah", [App\Http\Controllers\Admin\UserController::class, 'edit'])->name('users.edit');
        Route::put("/users/{id}", [App\Http\Controllers\Admin\UserController::class, 'update'])->name('users.update');
        Route::delete("/users/{id}", [App\Http\Controllers\Admin\UserController::class, 'destroy'])->name('users.destroy');
        Route::delete("/users", [App\Http\Controllers\Admin\UserController::class, 'bulk_destroy'])->name('users.bulk_destroy');

        // Hak Akses
        Route::get("/hak-akses", [App\Http\Controllers\Admin\HakaksesController::class, 'index'])->name('hak-akses.index');
        Route::get("/hak-akses/tambah", [App\Http\Controllers\Admin\HakaksesController::class, 'create'])->name('hak-akses.create');
        Route::post("/hak-akses", [App\Http\Controllers\Admin\HakaksesController::class, 'store'])->name('hak-akses.store');
        Route::get("/hak-akses/{id}/ubah", [App\Http\Controllers\Admin\HakaksesController::class, 'edit'])->name('hak-akses.edit');
        Route::put("/hak-akses/{id}", [App\Http\Controllers\Admin\HakaksesController::class, 'update'])->name('hak-akses.update');
        Route::delete("/hak-akses/{id}", [App\Http\Controllers\Admin\HakaksesController::class, 'destroy'])->name('hak-akses.destroy');
        Route::delete("/hak-akses", [App\Http\Controllers\Admin\HakaksesController::class, 'bulk_destroy'])->name('hak-akses.bulk_destroy');

        // Setting
        Route::get("/pengaturan", [App\Http\Controllers\Admin\PengaturanController::class, 'index'])->name('pengaturan.index');
        Route::get("/pengaturan/{id}/ubah", [App\Http\Controllers\Admin\PengaturanController::class, 'edit'])->name('pengaturan.edit');
        Route::put("/pengaturan/{id}", [App\Http\Controllers\Admin\PengaturanController::class, 'update'])->name('pengaturan.update');
    });
});

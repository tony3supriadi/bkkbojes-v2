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
        Route::get("/", [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    });
});

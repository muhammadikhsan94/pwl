<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\{
    LoginController, RegisterController
};
use App\Http\Controllers\{
    HomeController, PenggunaController, PeranController
};

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::prefix('auth')->name('auth.')->group(function() {
    Route::get('login', [LoginController::class, 'index'])->name('login');
    Route::post('login', [LoginController::class, 'authenticate'])->name('login.authenticate');
    Route::get('register', [RegisterController::class, 'index'])->name('register');
    Route::post('register', [RegisterController::class, 'store'])->name('register.store');
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
});

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('', [HomeController::class, 'index'])->name('home');

    Route::prefix('pengguna')->name('pengguna.')->group(function() {
        Route::get('', [PenggunaController::class, 'index'])->name('index');
        Route::get('data', [PenggunaController::class, 'data'])->name('data');
        Route::get('{id}', [PenggunaController::class, 'edit'])->name('edit');
        Route::put('{id}', [PenggunaController::class, 'update'])->name('update');
    });

    Route::prefix('peran')->name('peran.')->group(function() {
        Route::get('', [PeranController::class, 'index'])->name('index');
        Route::get('data', [PeranController::class, 'data'])->name('data');
        Route::get('create', [PeranController::class, 'create'])->name('create');
        Route::post('', [PeranController::class, 'store'])->name('store');
        Route::get('{id}/edit', [PeranController::class, 'edit'])->name('edit');
        Route::put('{id}', [PeranController::class, 'update'])->name('update');
        Route::delete('{id}', [PeranController::class, 'destroy'])->name('destroy');
    });
});

Auth::routes();

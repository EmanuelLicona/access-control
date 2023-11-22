<?php

use App\Http\Controllers\Access\AccessController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ExcelController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('/', function () {
        return view('welcome');
    })->name('welcome');

    Route::get('/login', [AuthController::class, 'create'])->name('login');
    Route::post('/login', [AuthController::class, 'store'])->name('auth.store');
});


Route::middleware('auth')->group(function () {
    Route::get('/logout', [AuthController::class, 'destroy'])->name('auth.destroy');

    Route::get('/home', function () {
        return view('home');
    })->name('home');


    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users/create', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/edit/{id}', [UserController::class, 'update'])->name('users.update');


    Route::get('/access', [AccessController::class, 'index'])->name('access.index');
    Route::get('/access/create/{id}', [AccessController::class, 'create'])->name('access.create');
    Route::post('/access/create/{id}', [AccessController::class, 'store'])->name('access.store');

    Route::get('/export', [ExcelController::class, 'index'])->name('exports.index');
    Route::get('/export/employees', [ExcelController::class, 'export_employees'])->name('exports.employees');
    Route::post('/export/access', [ExcelController::class, 'export_access'])->name('exports.access');


    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::put('/profile/edit/{id}', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile/edit/password/{id}', [ProfileController::class, 'chage_password'])->name('profile.password');
});

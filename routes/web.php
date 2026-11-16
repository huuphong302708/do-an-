<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CountryController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/user/profile', [UserController::class, 'profile'])->name('admin.profile');
    Route::post('/user/profile', [UserController::class, 'update'])->name('admin.profile.update');

    Route::get('/country', [CountryController::class, 'index'])->name('admin.country.index');
    Route::get('/country/create', [CountryController::class, 'create'])->name('admin.country.create');
    Route::post('/country/store', [CountryController::class, 'store'])->name('admin.country.store');
    Route::get('/country/edit/{id}', [CountryController::class, 'edit'])->name('admin.country.edit');
    Route::post('/country/update/{id}', [CountryController::class, 'update'])->name('admin.country.update');
    Route::get('/country/delete/{id}', [CountryController::class, 'delete'])->name('admin.country.delete');
});
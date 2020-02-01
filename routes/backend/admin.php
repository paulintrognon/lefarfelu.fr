<?php

use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\PageController;

// All route names are prefixed with 'admin.'.

Route::redirect('/', '/admin/dashboard', 301);
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('pages', [PageController::class, 'list'])->name('page.list');
Route::get('pages/create', [PageController::class, 'create'])->name('page.create');
Route::post('pages/store', [PageController::class, 'store'])->name('page.store');
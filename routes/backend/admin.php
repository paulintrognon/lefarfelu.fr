<?php

use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\FileController;
use App\Http\Controllers\Backend\MediaController;
use App\Http\Controllers\Backend\PageController;

// All route names are prefixed with 'admin.'.

Route::redirect('/', '/admin/dashboard', 301);
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Pages
Route::get('pages', [PageController::class, 'list'])->name('page.list');
Route::get('pages/create', [PageController::class, 'create'])->name('page.create');
Route::post('pages/store', [PageController::class, 'store'])->name('page.store');
Route::get('pages/{page}/edit', [PageController::class, 'edit'])->name('page.edit');
Route::post('pages/{page}/update', [PageController::class, 'update'])->name('page.update');

// Fichiers
Route::get('files', [FileController::class, 'list'])->name('file.list');
Route::get('files/create', [FileController::class, 'create'])->name('file.create');
Route::post('files/store', [FileController::class, 'store'])->name('file.store');
Route::get('files/{file}/edit', [FileController::class, 'edit'])->name('file.edit');
Route::post('files/{file}/update', [FileController::class, 'update'])->name('file.update');
Route::get('files/{file}/delete', [FileController::class, 'delete'])->name('file.delete');

// Media
Route::post('media/tinymce_upload', [MediaController::class, 'tinymce_upload'])->name('media.tinymce_upload');
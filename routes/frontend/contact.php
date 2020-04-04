<?php

/*
 * Frontend Controllers
 * All route names are prefixed with 'frontend.'.
 */
use App\Http\Controllers\Frontend\ContactController;

Route::get('contact', [ContactController::class, 'index'])->name('contact');
Route::post('contact/send', [ContactController::class, 'send'])->name('contact.send');
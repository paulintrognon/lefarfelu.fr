<?php

use App\Http\Controllers\Frontend\MediaController;

Route::get('media/{filename}/view', [MediaController::class, 'get'])->name('media.get');
Route::get('media/{filename}/download', [MediaController::class, 'download'])->name('media.download');

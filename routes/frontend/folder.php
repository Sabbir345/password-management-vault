<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\Dashboard\DashboardController;

	Route::get('/get-folder', [DashboardController::class, 'getFolders']);
    Route::post('/folder', [DashboardController::class, 'store'])->name('folder.store');

?>
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\Dashboard\DashboardController;

	Route::get('/get-categories', [DashboardController::class, 'getCategories']);
    Route::post('/category', [DashboardController::class, 'categoryStore'])->name('category.store');
    Route::post('/category-delete', [DashboardController::class, 'categoryDelete'])->name('category.delete');
?>
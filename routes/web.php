<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\Dashboard\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group([
        'middleware' => 'auth'
    ], function () {
    
    // include_once 'User/dashboard.php';
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/folder-add', [DashboardController::class, 'folderAdd'])->name('folder.add');
    Route::post('/folder-update', [DashboardController::class, 'folderUpdate'])->name('folder.update');
    Route::delete('/folder-delete', [DashboardController::class, 'folderDelete'])->name('folder.delete');
});

require __DIR__.'/auth.php';

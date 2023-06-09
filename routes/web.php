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
    
    
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    include_once 'frontend/folder.php';
    include_once 'frontend/items.php';
    include_once 'frontend/category.php';
});

require __DIR__.'/auth.php';

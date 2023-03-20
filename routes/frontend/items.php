<?php

use Illuminate\Support\Facades\Route;	
use App\Http\Controllers\Frontend\Dashboard\ItemController;

	Route::post('/item' , [ItemController::class, 'store'])->name('item.store');
    Route::get('/get-items' , [ItemController::class, 'getItems']);
    Route::get('/items-export',[ItemController::class, 'itemExport']);
    Route::post('/items-import',[ItemController::class, 'itemImport']);
    Route::get('/example-csv',[ItemController::class, 'exampleCSV']);
    
?>
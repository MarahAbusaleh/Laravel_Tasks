<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ItemController;
use Illuminate\Support\Facades\Route;



// Route::get('/', function () {
//     return view('Category.create');
// });

Route::resource('Category', CategoryController::class);

Route::get('/categorytable', [CategoryController::class, 'categorytable'])->name('Category.categorytable');

Route::resource('Item', ItemController::class);

Route::get('/itemtable', [ItemController::class, 'itemtable'])->name('Item.itemtable');

Route::get('/dash', function(){
    return view('Category.dash');
})->name('dash');
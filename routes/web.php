<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/products', [ProductController::class, 'index']);
Route::get('/insert', [ProductController::class, 'insert']);
Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::get('/products/delete/{id}', [ProductController::class, 'delete']);
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');
Route::post('/products/store', [ProductController::class, 'store'])->name('products.store');
Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');
Route::delete('/products/{id}', [ProductController::class, 'update'])->name('products.update');


// Route::resource otomatis akan membuat 7 rute CRUD standar (index, 
// create, 
// store, show, edit, update, destroy) ke dalam aplikasi.
Route::resource('categories', CategoryController::class);
Route::resource('products', ProductController::class);
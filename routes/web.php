<?php

use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/admin/upload', function () {
//     return view('admin.upload');
// });

// Route::get('/admin/upload', function () {
//     return view('admin.upload');
// })->name('upload.page');

Route::get('/admin/upload', [ProductController::class, 'index'])->name('upload.page');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');
Route::put('/products/update/{id}', [ProductController::class, 'update'])->name('product.update');




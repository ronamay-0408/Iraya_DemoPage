<?php

use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', [ProductController::class, 'showWelcome']);

// Route::get('/admin/upload', function () {
//     return view('admin.upload');
// });

// Route::get('/admin/upload', function () {
//     return view('admin.upload');
// })->name('upload.page');

Route::get('/admin/upload', [ProductController::class, 'index'])->name('upload.page');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');
Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');



Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', function () {
    return view('admin.copyofupload');
})->middleware(['auth', 'verified'])->name('admin');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
require __DIR__.'/auth.php';

Route::get('/admin/upload', function () {
    return view('admin.upload');
});

// Registration is currently blocked 
Route::get('/register', function () {
    return redirect('/login');
});

// User/s already logged in cannot access the login page and is redirected to the admin page
Route::get('/login', function() {
    if (Auth::check()) {
        return redirect('/admin');
    }
    return view('auth.login');
})->name('login');
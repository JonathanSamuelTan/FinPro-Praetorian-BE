<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[ProductController::class,'index'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::get('/cart',[TransactionController::class,'showCart'])->name('cart.show');
    Route::post('/cart/{id}',[TransactionController::class,'addToCart'])->name('cart.create');
    Route::patch('/cart/{id}',[TransactionController::class,'updateQTC'])->name('cart.update');
    Route::delete('/cart/{id}',[TransactionController::class,'remove'])->name('cart.delete');

    Route::get('/transaction',[TransactionController::class,'showTransacionPage'])->name('transaction.show');
    Route::post('/transaction',[TransactionController::class,'store'])->name('transaction.store');
});

Route::middleware('isAdmin')->group(function () {
    Route::get('/AdminDashboard',[AdminController::class,'AdminDashboard'])->name('adminDashboard');
    Route::get('/product',[ProductController::class,'create'])->name('product.create');
    Route::post('/product',[ProductController::class,'store'])->name('product.store');
    Route::get('/product/{id}',[ProductController::class,'edit'])->name('product.edit');
    Route::patch('/product/{id}',[ProductController::class,'update'])->name('product.update'); 
    Route::delete('/product/{id}',[ProductController::class,'destroy'])->name('product.delete'); 

});

require __DIR__.'/auth.php';

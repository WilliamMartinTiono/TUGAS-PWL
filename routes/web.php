<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

// Halaman utama
Route::get('/', function () {
    if (auth()->check()) {
        return redirect('/product');
    }

    return redirect('/login');
});

// Login dan Register (di luar middleware auth)
Route::get('/login', [AuthController::class, 'loginView']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'registerView']);
Route::post('/register', [AuthController::class, 'register']);

// Logout
Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth');

// Halaman aplikasi (wajib login)
Route::middleware('auth')->group(function () {

    // Transaction
    Route::get('/transaction', [TransactionController::class, 'index']);
    Route::get('/create-transaction', [TransactionController::class, 'create']);
    Route::post('/transaction', [TransactionController::class, 'store']);
    Route::get('/transaction/{id}', [TransactionController::class, 'show']);
    Route::get('/edit-transaction/{id}', [TransactionController::class, 'edit']);
    Route::put('/transaction/{id}', [TransactionController::class, 'update']);
    Route::delete('/transaction/{id}', [TransactionController::class, 'destroy']);

    // Supplier
    Route::get('/supplier', [SupplierController::class, 'index']);
    Route::get('/create-supplier', [SupplierController::class, 'create']);
    Route::post('/supplier', [SupplierController::class, 'store']);
    Route::get('/supplier/{id}', [SupplierController::class, 'show']);
    Route::get('/edit-supplier/{id}', [SupplierController::class, 'edit']);
    Route::put('/supplier/{id}', [SupplierController::class, 'update']);
    Route::delete('/supplier/{id}', [SupplierController::class, 'destroy']);

    // Product
    Route::get('/product', [ProductController::class, 'index']);
    Route::get('/create-product', [ProductController::class, 'create']);
    Route::post('/product', [ProductController::class, 'store']);
    Route::get('/product/{id}', [ProductController::class, 'show']);
    Route::get('/edit-product/{id}', [ProductController::class, 'edit']);
    Route::put('/product/{id}', [ProductController::class, 'update']);
    Route::delete('/product/{id}', [ProductController::class, 'destroy']);
});

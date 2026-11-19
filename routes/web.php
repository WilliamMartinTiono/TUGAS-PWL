<?php
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\TransactionController;
use App\Models\Transaction;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    //return view('welcome');
    return transaction::get();
});

Route :: get('/transaction', [TransactionController::class, 'index']);
Route :: get('/create-transaction', [TransactionController::class, 'create']);
Route :: post('/transaction', [TransactionController::class, 'store']);
Route :: get('/transaction/{id}', [TransactionController::class, 'show']);
Route :: get('/edit-transaction/{id}', [TransactionController::class, 'edit']);
Route :: put('/transaction/{id}', [TransactionController::class, 'update']);
Route :: delete('/transaction/{id}', [Transaction::class, 'destroy']);

Route :: get('/supplier', [SupplierController::class, 'index']);
Route :: get('/create-supplier', [SupplierController::class, 'create']);
Route :: post('/supplier', [SupplierController::class, 'store']);
Route :: get('/supplier/{id}', [SupplierController::class, 'show']);
Route :: get('/edit-supplier/{id}', [SupplierController::class, 'edit']);
Route :: put('/supplier/{id}', [SupplierController::class, 'update']);
Route :: delete('/supplier/{id}', [SupplierController::class, 'destroy']);

Route :: get('/product', [ProductController::class, 'index']);
Route :: get('/create-product', [ProductController::class, 'create']);
Route :: post('/product', [ProductController::class, 'store']);
Route ::get('/product/{id}', [ProductController::class, 'show']);
Route ::get('/edit-product/{id}', [ProductController::class, 'edit']);
Route :: put('/product/{id}', [ProductController::class, 'update']);
Route :: delete('/product/{id}', [ProductController::class, 'destroy']);


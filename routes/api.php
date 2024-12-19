<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\SpareController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Product Routes
Route::prefix('products')->group(function () {
    Route::get('/', [ProductController::class, 'index']); // Mengambil semua produk
    Route::post('/', [ProductController::class, 'store']); // Menyimpan produk
    Route::delete('{id}', [ProductController::class, 'destroy']); // Menghapus produk berdasarkan ID
});

Route::post('spares', [SpareController::class, 'store']);
// Route to delete a spare
Route::delete('spares/{id}', [SpareController::class, 'destroy']);

// Route to get a specific spare by ID
Route::get('spares/{id}', [SpareController::class, 'show']);
Route::get('spares', [SpareController::class, 'show']);
Route::get('spares', [SpareController::class, 'index']);
Route::get('spares/{id}', [SpareController::class, 'index']);

Route::put('/spares/{id}', [SpareController::class, 'update']);

Route::get('spares/{id}', [SpareController::class, 'update']);
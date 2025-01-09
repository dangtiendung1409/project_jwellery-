<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\dashboardController;
use App\Http\Controllers\Admin\productController;
//dashboard
Route::get('/dashboard',[dashboardController::class,'dashboard'])
    ->name('admin.dashboard');

// product management
Route::get('/products',[productController::class,'products'])
    ->name('admin.products');
Route::get('/detailProduct/{id}', [productController::class, 'detailProduct'])
    ->name('admin.detailProduct');
Route::get('/addProduct', [productController::class, 'addProduct'])
    ->name('admin.addProduct');
Route::post('/storeProduct', [productController::class, 'storeProduct'])
    ->name('admin.storeProduct');
Route::get('/editProduct/{id}', [productController::class, 'editProduct'])
    ->name('admin.editProduct');
Route::post('/updateProduct/{id}', [productController::class, 'updateProduct'])
    ->name('admin.updateProduct');
Route::delete('/deleteProduct/{id}', [productController::class, 'deleteProduct'])
    ->name('admin.deleteProduct');

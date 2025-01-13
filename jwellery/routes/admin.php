<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\dashboardController;
use App\Http\Controllers\Admin\productController;
use App\Http\Controllers\Admin\categoryController;
use App\Http\Controllers\Admin\blogController;
use App\Http\Controllers\Admin\orderController;
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

// category
Route::get('/category', [categoryController::class, 'category'])
    ->name('admin.category');
Route::get('/addCategory', [categoryController::class, 'addCategory'])
    ->name('admin.addCategory');
Route::post('/storeCategory', [categoryController::class, 'storeCategory'])
    ->name('admin.storeCategory');
Route::get('/editCategory/{id}', [categoryController::class, 'editCategory'])
    ->name('admin.editCategory');
Route::post('/updateCategory/{id}', [categoryController::class, 'updateCategory'])
    ->name('admin.updateCategory');
Route::delete('/deleteCategory/{id}', [categoryController::class, 'deleteCategory'])
    ->name('admin.deleteCategory');

// Blog
Route::get('/blogs', [blogController::class, 'blogs'])
    ->name('admin.blogs');
Route::get('/addBlog', [blogController::class, 'addBlog'])
    ->name('admin.addBlog');
Route::post('/storeBlog', [blogController::class, 'storeBlog'])
    ->name('admin.storeBlog');
Route::get('/editBlog/{id}', [blogController::class, 'editBlog'])
    ->name('admin.editBlog');
Route::post('/updateBlog/{id}', [blogController::class, 'updateBlog'])
    ->name('admin.updateBlog');
Route::delete('/deleteBlog/{id}', [blogController::class, 'deleteBlog'])
    ->name('admin.deleteBlog');

// Order
Route::get('/orders', [orderController::class, 'orders'])
    ->name('admin.orders');
Route::get('/orders/details/{id}', [orderController::class, 'orderDetails'])
    ->name('admin.orderDetails');
Route::patch('/orders/update-status/{id}/{status}', [orderController::class, 'updateOrderStatus'])
    ->name('admin.updateOrderStatus');

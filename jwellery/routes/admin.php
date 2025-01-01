<?php
use Illuminate\Support\Facades\Route;
//dashboard
Route::get('/dashboard',[\App\Http\Controllers\Admin\dashboardController::class,'dashboard'])
    ->name('admin.dashboard');

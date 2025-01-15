<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;

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

Route::get('/', function () {
    return view('index');
});
Route::get('loginAdmin', [AuthController::class, 'showLoginForm'])->name('loginAdmin');
Route::post('loginAdmin', [AuthController::class, 'login']);
Route::post('logoutAdmin', [AuthController::class, 'logout'])->name('logoutAdmin');

Route::get('/{vue_capture?}', function() {
    return view('index');
})->where('vue_capture', '[\/\w\.-]*');

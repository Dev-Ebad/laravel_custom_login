<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\LoginCotroller;
use App\Http\Controllers\UserController;
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



Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginCotroller::class, 'login'])->name('login');
    Route::post('/login', [LoginCotroller::class, 'login_req'])->name('login_req');
});
Route::post('logout' , [LoginCotroller::class , 'logout'])->name('logout');

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function(){
    Route::get('/' , [AdminController::class , 'dashboard'])->name('admin.dashboard');
    Route::get('/calender' , [AdminController::class , 'calender'])->name('admin.calender');
});
Route::middleware(['auth', 'user'])->prefix('user')->group(function(){
    Route::get('/' , [UserController::class , 'dashboard'])->name('user.dashboard');
});



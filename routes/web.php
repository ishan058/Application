<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ShopController::class, 'dashboard'])->name('dashboard')->middleware(['auth']);
Route::get('/login', [Homecontroller::class, 'login'])->name('login');
Route::get('/register', [Homecontroller::class, 'register'])->name('register');
Route::post('/register', [UserController::class, 'registerUser'])->name('registerUser');
Route::post('/login', [UserController::class, 'loginUser'])->name('loginUser');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

Route::get('/delete/{id}', [ShopController::class, 'deleteData']);
Route::get('/edit/{id}', [ShopController::class, 'editData']);
Route::post('/edit', [ShopController::class, 'updateData'])-> name('updateData');

Route::post('/save-data' , [ShopController::class, 'saveData'])-> name('saveData');




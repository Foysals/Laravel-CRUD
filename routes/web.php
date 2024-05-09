<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;



Route::middleware('auth')->group(function () {
Route::get('/', [HomeController::class, 'dash'])->name('dash');
Route::get('/user', [HomeController::class, 'index'])->name('user');
Route::get('/add-user', [HomeController::class, 'adduser'])->name('adduser');
Route::post('/store', [HomeController::class, 'store'])->name('store');
Route::get('/edit/{id}',[HomeController::class, 'edit'])->name('edit');
Route::post('/update',[HomeController::class, 'update'])->name('update');
Route::get('/delete/{id}',[HomeController::class, 'delete'])->name('delete');
Route::get('/trash-userinfo', [HomeController::class, 'trash'])->name('trash');
Route::get('/restore-userinfo/{id}', [HomeController::class, 'restore'])->name('restore');
Route::get('/delete-userinfo-permanently/{id}', [HomeController::class, 'deletePermanently'])->name('deletePermanently');
});




Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/register', [LoginController::class, 'index2'])->name('register');
Route::post('/register', [LoginController::class, 'register'])->name('register');




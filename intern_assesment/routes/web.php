<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [CarController::class,'index'])->middleware('isLoggedIn');
Route::get('/login', [LoginController::class,'login'])->name('login')->middleware('alreadyLoggedIn');
Route::get('/registration', [LoginController::class,'registration'])->name('registration')->middleware('alreadyLoggedIn');
Route::post('/registration', [LoginController::class,'registerUser'])->name('registerUser');
Route::post('/login', [LoginController::class,'loginUser'])->name('login_user');
Route::get('/logout', [LoginController::class,'logout'])->name('logout')->middleware('isLoggedIn');

Route::get('/cars', [CarController::class,'index'])->name('car.index')->middleware('isLoggedIn');
Route::get('/car/create', [CarController::class,'create'])->name('car.create')->middleware('adminLoggedIn');
Route::post('/car/create', [CarController::class,'register'])->name('car.create');
Route::get('/car/delete/{id}', [CarController::class,'delete'])->name('car.delete')->middleware('adminLoggedIn');
Route::get('/car/show/{id}', [CarController::class,'show'])->name('car.show')->middleware('isLoggedIn');
Route::get('/car/edit/{id}', [CarController::class,'edit'])->name('car.edit')->middleware('adminLoggedIn');
Route::post('/car/edit/{id}', [CarController::class,'update'])->name('car.edit');



Route::get('/users', [UserController::class,'index'])->name('user.index')->middleware('adminLoggedIn');
Route::get('/user/edit/{id}', [UserController::class,'edit'])->name('user.edit')->middleware('adminLoggedIn');
Route::post('/user/edit/{id}', [UserController::class,'update'])->name('user.edit');
Route::get('/user/delete/{id}', [UserController::class,'delete'])->name('user.delete')->middleware('adminLoggedIn');

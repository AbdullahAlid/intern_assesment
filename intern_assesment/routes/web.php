<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\AdminController;
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

Route::get('/', [CarController::class,'index']);

Route::get('/cars', [CarController::class,'index'])->name('car.index');
Route::get('/car/create', [CarController::class,'create'])->name('car.create');
Route::post('/car/create', [CarController::class,'register'])->name('car.create');
Route::get('/car/delete/{id}', [CarController::class,'delete'])->name('car.delete');
Route::get('/car/show/{id}', [CarController::class,'show'])->name('car.show');
Route::get('/car/delete/{id}', [CarController::class,'delete'])->name('car.delete');
Route::get('/car/edit/{id}', [CarController::class,'edit'])->name('car.edit');
Route::post('/car/edit/{id}', [CarController::class,'update'])->name('car.edit');



Route::get('/admins', [AdminController::class,'index'])->name('admin.index');
Route::get('/admin/create', [AdminController::class,'create'])->name('admin.create');
Route::post('/admin/create', [AdminController::class,'register'])->name('admin.create');
Route::get('/admin/edit/{id}', [AdminController::class,'edit'])->name('admin.edit');
Route::post('/admin/edit/{id}', [AdminController::class,'update'])->name('admin.edit');
Route::get('/admin/delete/{id}', [AdminController::class,'delete'])->name('admin.delete');

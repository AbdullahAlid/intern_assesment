<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CarController;


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

Route::get('/', function () {
    return view('admin.login');
});
/*-Admin routes-*/
Route::prefix('admin')->group(function(){
    Route::get('/login',[AdminController::class,'login'])->name('login-form');
    Route::post('/login',[AdminController::class,'loggedin'])->name('loggedin');
    Route::get('/registration',[AdminController::class,'registration'])->name('registration');
    Route::post('/registration',[AdminController::class,'registerAdmin'])->name('register');
    route::get('logout',[AdminController::class,'logout'])->name('logout');
    Route::get('/', [AdminController::class,'index'])->name('admin.index')->middleware('admin');
    Route::get('/edit/{id}', [AdminController::class,'edit'])->name('admin.edit')->middleware('admin');
    Route::post('/edit/{id}', [AdminController::class,'update'])->name('admin.edit')->middleware('admin');
    Route::get('/delete/{id}', [AdminController::class,'delete'])->name('admin.delete')->middleware('admin');

});
Route::prefix('car')->group(function(){
    Route::get('/',[CarController::class,'index'])->name('car.index')->middleware('admin');
    Route::get('/create', [CarController::class,'create'])->name('car.create')->middleware('admin');
    Route::post('/create', [CarController::class,'register'])->name('car.create');
    Route::get('/delete/{id}', [CarController::class,'delete'])->name('car.delete')->middleware('admin');
    Route::get('/show/{id}', [CarController::class,'show'])->name('car.show')->middleware('admin');
    Route::get('/edit/{id}', [CarController::class,'edit'])->name('car.edit')->middleware('admin');
    Route::post('/edit/{id}', [CarController::class,'update'])->name('car.edit');
});

/*--end of admin routes
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
*/
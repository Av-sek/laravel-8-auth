<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

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


Route::prefix('student')->group(
    function(){
        Route::post('/login',[AuthController::class,'authStudent'])->name('student.auth');
        Route::get('/register',[AuthController::class,'register'])->name('student.register');
        Route::post('/create',[AuthController::class,'createStudent'])->name('student.create');
        Route::get('/dashboard',[StudentController::class,'dashboard'])->name('student.dashboard');
        Route::post('/logout',[StudentController::class,'logout'])->name('student.logout');
    }
);

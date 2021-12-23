<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Models\Admin;
use Illuminate\Support\Facades\Route;

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


Route::prefix('admin')->group(
    function(){
        Route::post('/login',[AuthController::class,'authAdmin'])->name('admin.auth');
        Route::get('/register',[AdminController::class,'register'])->name('admin.register');
        Route::post('/create',[AdminController::class,'createAdmin'])->name('admin.create');
        Route::get('/dashboard',[AdminController::class,'dashboard'])->name('admin.dashboard');
        Route::post('/logout',[AdminController::class,'logout'])->name('admin.logout');
    }
);


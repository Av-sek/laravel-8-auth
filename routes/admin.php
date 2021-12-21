<?php

use App\Http\Controllers\AdminController;
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
        Route::get('/login',[AdminController::class,'login'])->name('admin.login');
        Route::get('/register',[AdminController::class,'register'])->name('admin.register');
        Route::post('/create',[AdminController::class,'createAdmin'])->name('admin.create');
    }
);


<?php

use App\Http\Controllers\Auth\AuthAdminController;
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

Route::redirect('/admin','/login/admin');
Route::name('admin.')->prefix('admin')->group(
    function(){
        Route::post('/login',[AuthAdminController::class,'authAdmin'])->name('auth');
        Route::post('/create',[AuthAdminController::class,'createAdmin'])->name('create');
        Route::get('/dashboard',[AdminController::class,'dashboard'])->name('dashboard');
        Route::post('/logout',[AdminController::class,'logout'])->name('logout');
    }
);


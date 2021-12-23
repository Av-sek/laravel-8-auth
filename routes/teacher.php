<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeacherController;

Route::prefix('teacher')->group(
    function(){
        Route::post('/login',[AuthController::class,'authTeacher'])->name('teacher.auth');
        Route::get('/register',[AuthController::class,'register'])->name('teacher.register');
        Route::post('/create',[AuthController::class,'createTeacher'])->name('teacher.create');
        Route::get('/dashboard',[TeacherController::class,'dashboard'])->name('teacher.dashboard');
        Route::post('/logout',[TeacherController::class,'logout'])->name('teacher.logout');
    }
);

<?php

use App\Http\Controllers\Auth\AuthTeacherController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeacherController;

Route::prefix('teacher')->name('teacher.')->group(
    function(){
        Route::post('/login',[AuthTeacherController::class,'authTeacher'])->name('auth');
        Route::post('/create',[AuthTeacherController::class,'createTeacher'])->name('create');
        Route::get('/dashboard',[TeacherController::class,'dashboard'])->name('dashboard');
        Route::post('/logout',[TeacherController::class,'logout'])->name('logout');
    }
);

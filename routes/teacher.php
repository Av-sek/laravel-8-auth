<?php

use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;

Route::prefix('teacher')->group(function(){
        Route::get('/login',[TeacherController::class,'login']);
        Route::get('/register',[TeacherController::class,'register']);
    }
);
Route::get("/teacher",function(){
    ;
});


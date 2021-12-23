<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\PublicController;
use PhpParser\Node\Scalar\MagicConst\Dir;

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


Route::get('/',function(){
    return view('welcome');
})->name('/');

Route::get('/login/{role}',[PublicController::class,'login'])->name('login');
Route::get('/register/{role}',[PublicController::class,'register'])->name('register');


require __DIR__."/admin.php";
require __DIR__."/teacher.php";
require __DIR__."/student.php";



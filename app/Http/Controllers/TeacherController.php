<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:teacher');
    }
    public function dashboard()
    {
        return view('teacher.dashboard');
    }
    public function logout(Request $res)
    {
        Auth::guard('teacher')->logout();

        $res->session()->invalidate();

        $res->session()->regenerateToken();

        return redirect('/login/teacher');
    }
}

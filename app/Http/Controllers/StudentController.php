<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:student');
    }
    public function dashboard()
    {
        return view('student.dashboard');
    }
    public function logout(Request $res)
    {
        Auth::guard('student')->logout();

        $res->session()->invalidate();

        $res->session()->regenerateToken();

        return redirect('/login/student');
    }
}

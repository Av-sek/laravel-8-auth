<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Http\Middleware\CustomAuth;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function dashboard()
    {
        return view('admin.dashboard');
    }
    public function logout(Request $res)
    {
        
        Auth::guard('admin')->logout();

        $res->session()->invalidate();

        $res->session()->regenerateToken();

        return redirect('/login/admin');
    }
}

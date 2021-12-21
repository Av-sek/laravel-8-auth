<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function login()
    {
        return view('admin.auth.login');
    }
    public function register()
    {
        return view('admin.auth.register');
    }
    public function createAdmin(Request $res)
    {
        $res->validate(
            [
                'username'=>'required|max:25|unique:admins',
                'email'=>'email|required|unique:admins',
                'password'=>'required',
                'password_confirm'=>'required_with:password|same:password'
            ]
            );
        $admin = new Admin();
        $admin->username = $res->username;
        $admin->email = $res->email;
        $admin->password = Hash::make($res->password);
        $admin->save();
        return redirect()->route('admin.login')->with('success','User Registered Successfully');
    }
    public function dashboard()
    {
        
    }
}

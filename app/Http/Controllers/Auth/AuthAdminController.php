<?php

namespace App\Http\Controllers\Auth;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
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
        return redirect()->route('login','admin')->with('success','User Registered Successfully');
    }
    public function authAdmin(Request $res)
    {
        $credentials = $res->validate([
            'username'=>'required',
            'email'=>'required|email',
            'password'=>'required',
        ]);
        if(Auth::guard('admin')->attempt($credentials)){
            $res->session()->regenerate();
            return redirect()->intended(route('admin.dashboard'));
        }
        return back()->withErrors([
            'email'=>'Incorrect email or password'
        ]);
    }
}

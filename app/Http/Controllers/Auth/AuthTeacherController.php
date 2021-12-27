<?php

namespace App\Http\Controllers\Auth;
use App\Models\Teacher;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthTeacherController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:teacher')->except('logout');
    }
    public function createTeacher(Request $res)
    {
        $res->validate(
            [
                'username'=>'required|max:25|unique:teachers',
                'email'=>'email|required|unique:teachers',
                'password'=>'required',
                'password_confirm'=>'required_with:password|same:password'
            ]
            );
        $teacher = new Teacher();
        $teacher->username = $res->username;
        $teacher->email = $res->email;
        $teacher->password = Hash::make($res->password);
        $teacher->save();
        return redirect()->route('login','teacher')->with('success','User Registered Successfully');
    }
    public function authTeacher(Request $res)
    {
        $credentials = $res->validate([
            'username'=>'required',
            'email'=>'required|email',
            'password'=>'required',
        ]);
        if(Auth::guard('teacher')->attempt($credentials)){
            $res->session()->regenerate();
            return redirect()->intended(route('teacher.dashboard'));
        }
        return back()->withErrors([
            'email'=>'Incorrect email or password'
        ]);
    }
}

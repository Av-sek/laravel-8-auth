<?php

namespace App\Http\Controllers\Auth;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthStudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:teacher')->except('logout');
    }
    public function createStudent(Request $res)
    {
        $res->validate(
            [
                'username'=>'required|max:25|unique:students',
                'email'=>'email|required|unique:students',
                'password'=>'required',
                'password_confirm'=>'required_with:password|same:password'
            ]
            );
        $student = new Student();
        $student->username = $res->username;
        $student->email = $res->email;
        $student->password = Hash::make($res->password);
        $student->save();
        return redirect()->route('login','student')->with('success','User Registered Successfully');
    }
    public function authstudent(Request $res)
    {
        $credentials = $res->validate([
            'username'=>'required',
            'email'=>'required|email',
            'password'=>'required',
        ]);
        if(Auth::guard('student')->attempt($credentials)){
            $res->session()->regenerate();
            return redirect()->intended(route('student.dashboard'));
        }
        return back()->withErrors([
            'email'=>'Incorrect email or password'
        ]);
    }
}

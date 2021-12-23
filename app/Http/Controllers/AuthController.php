<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Teacher;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Contracts\Service\Attribute\Required;

class AuthController extends Controller
{
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
        return redirect()->route('login/teacher')->with('success','User Registered Successfully');
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
        return redirect()->route('student.dashboard')->with('success','User Registered Successfully');
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

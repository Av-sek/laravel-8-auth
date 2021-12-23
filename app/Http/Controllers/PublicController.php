<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;

class PublicController extends Controller
{
    public function login($role)
    {
        return view('login',compact('role'));
    }
    public function register($role)
    {
        return view('register',compact('role'));
    }
}

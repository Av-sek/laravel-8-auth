<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class LoggedInMiddelware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::guard('admin')->check()&&$request->path()=='login/admin'||$request->path()=='register/admin'&&Session::get('admin'))
        {
            return redirect()->route('admin.dashboard');
        }
        if(Auth::guard('teacher')->check()&&$request->path()=='login/teacher'||$request->path()=='register/teacher'&&Session::get('teacher'))
        {
            return redirect()->route('admin.dashboard');
        }
        if(Auth::guard('student')->check()&&$request->path()=='login/student'||$request->path()=='register/student'&&Session::get('student'))
        {
            return redirect()->route('admin.dashboard');
        }
        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string|null  ...$guards
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $guard= null)
    {
        dd($guard);
        switch($guard){
            case 'admin':
                if(Auth::guard($guard)->check()){
                    return route('admin.dashboard');
                }
                break;
            case 'teacher':
                if(Auth::guard($guard)->check()){
                    return route('admin.dashboard');
                }
                break;
            case 'student':
                if(Auth::guard($guard)->check()){
                    return route('admin.dashboard');
                }
                break;
        }

        return $next($request);
    }
}

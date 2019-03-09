<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @param array $roles
     * @return mixed
     */
    public function handle($request, Closure $next, ...$roles)
    {

        if(!auth()->user()) return Redirect::route('login')->with('error', 'you need to be logged in');
        if(!in_array(strtolower(auth()->user()->role), $roles)){
            Auth::logout();
            return Redirect::route('login')->with('error', 'you do not have permission to access this page');
        }

        return $next($request);
    }
}

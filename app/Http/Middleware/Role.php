<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

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

        if(!auth()->user() && in_array(strtolower(auth()->user()->role), $roles)){
            Auth::logout();
            return redirect()->route('login')->with('error', 'access denied');
        }

        return $next($request);
    }
}

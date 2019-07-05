<?php

namespace App\Http\Middleware;

use App\Users;
use Closure;
use Illuminate\Support\Facades\Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //var_dump(Auth::user()); exit;
        if (Auth::guest() === false && Auth::user()->role === Users::ROLE_ADMIN) {
            return $next($request);
        } else {
            return redirect('/');
        }
    }
}

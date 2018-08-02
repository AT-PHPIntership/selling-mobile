<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Support\Facades\Auth;

class AdminAuthenticate
{
    /**
    * Handle an incoming request.
    *
    * @param \Illuminate\Http\Request $request Request
    * @param \Closure                 $next    Next
    *
    * @return mixed
    */
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::User()->getOriginal('role') == config('setting.role.admin')) {
            return $next($request);
        }

        return redirect('/');
    }
}

<?php

namespace App\Http\Middleware;

use Closure;

use Auth;

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
        if (Auth::User()) {
            if (!Auth::User()->getOriginal('role') == config('setting.role.admin')) {
                return redirect('/');
            }

            return $next($request);
        }
    }
}

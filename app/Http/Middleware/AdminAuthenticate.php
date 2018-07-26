<?php

namespace App\Http\Middleware;

use Closure;

use Auth;

class AdminAuthenticate
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
        if (!Auth::User()->getOriginal('role') == config('setting.role.admin')) {

            return redirect('/');
        }

        return $next($request);
    }
}

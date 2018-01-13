<?php

namespace App\Http\Middleware;
use Auth;
use Closure;

class IsInnovatorMiddleware
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
        if(!Auth::check() || Auth::user()->roles != '3'){
            return redirect()->route('login');
        }
        return $next($request);
    }
}

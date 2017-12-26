<?php

namespace App\Http\Middleware;
use Auth;
use Closure;

class IsFunderMiddleware
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
        if(!Auth::check() || Auth::user()->roles != '2'){
            return redirect()->route('/');
        }
        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SuperMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::guard('super')->check() != 1){
            return redirect()->route('auth.super.index')->with('danger', 'Kamu tidak memiliki ke laman tersebut');
        }
        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StakeholderMiddleware
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
        if(Auth::guard('stakeholder')->check() != 1){
            return redirect()->route('auth.stakeholder.index')->with('danger', 'Kamu tidak memiliki ke laman tersebut');
        }
        return $next($request);
    }
}

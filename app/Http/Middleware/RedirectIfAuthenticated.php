<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        if($request->is('*/admin*')){
            if(Auth::guard('admin')->check() == 1){
                return redirect()->route('admin.dashboard.index');
            }
        }else if($request->is('*/stakeholder*')){
            if(Auth::guard('stakeholder')->check() == 1){
                return redirect()->route('stakeholder.dashboard.index');
            }
        }else{
            if(Auth::guard('super')->check() == 1){
                return redirect()->route('super.dashboard.index');
            }
        }

        return $next($request);
    }
}

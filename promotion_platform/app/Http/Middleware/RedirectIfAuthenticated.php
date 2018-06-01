<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if($guard) {
            if (Auth::guard($guard)->check()) {
                return redirect("/{$guard}/index");
            }
        }else{
            if (Auth::guard("channel")->check()) {
                return redirect("/channel/index");
            }
            if (Auth::guard("liaison")->check()) {
                return redirect("/liaison/index");
            }
        }
        return $next($request);
    }
}

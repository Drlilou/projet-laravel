<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
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


        if (Auth::guard('admin')->check()) {
            return redirect()->route('admin');
            return $next($request);
        }

        if (Auth::guard('ensignaint')->check()) {
            return redirect()->route('ensignaint');
            return $next($request);
        }

        if (Auth::guard('web')->check()) {
            return redirect()->route('etudiant');
            return $next($request);
        }



        return $next($request);
    }
}

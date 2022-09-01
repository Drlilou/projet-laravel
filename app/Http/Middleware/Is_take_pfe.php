<?php

namespace App\Http\Middleware;

use Closure;
use Auth;


class Is_take_pfe
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
        $bol = Auth::guard('web')->user()->is_take_pfe;
        if($bol==1){
            return redirect() -> route('etudiant');
        }
        return $next($request);
    }
}

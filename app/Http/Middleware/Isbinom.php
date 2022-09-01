<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class Isbinom
{
    /**
     * Handle an incoming request.
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $binom = Auth::guard('web')->user()->binom;
        if($binom){
            return redirect() -> route('etudiant');
        }
        return $next($request);
    }
}

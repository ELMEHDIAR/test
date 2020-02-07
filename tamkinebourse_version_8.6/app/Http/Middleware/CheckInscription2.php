<?php

namespace App\Http\Middleware;

use Closure;

class CheckInscription2
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
        try{
            if( \Auth::user()->inscription_interne ) {
                return $next($request);
            } else {
                return \Redirect::to("/home");
            }
        } catch( \Exception $ex) {
            return \Redirect::to("/");
        }
    }
}

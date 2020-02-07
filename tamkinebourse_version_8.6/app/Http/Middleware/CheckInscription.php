<?php

namespace App\Http\Middleware;

use Closure;

class CheckInscription
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
        try {
            if( \Auth::user()->inscription_interne ) {
                return \Redirect::to("/info");
            } else {
                return $next($request);
            }
        } catch( \Exception $ex) {
            return \Redirect::to("/");
        }
    }
}

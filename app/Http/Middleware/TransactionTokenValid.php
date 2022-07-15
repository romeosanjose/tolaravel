<?php

namespace App\Http\Middleware;

use Closure;

class TransactionTokenValid
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
        
        json_decode($request->getContent());

        if (json_last_error() != JSON_ERROR_NONE) {
            abort(400, 'Bad JSON received');
        }

        if ($request->has('password') && $request->input('password') == env('REQUEST_TOKEN', 'Cr@cker$!') ) {
            return $next($request);    
        }

        abort(401);
        
    }
}

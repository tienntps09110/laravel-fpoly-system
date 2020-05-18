<?php

namespace App\Http\Middleware;

use Closure;

class JWTmiddleware
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
        if(!$request->secset && !$request->secset == 'tantien'){
            return response()->json(['info'=>'hello']);
        }
        return $next($request);
    }
}

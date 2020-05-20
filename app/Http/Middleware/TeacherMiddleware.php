<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\Http\Controllers\Core\Core;

class TeacherMiddleware
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
        if(!Auth::check()){
            return redirect()->route('login'); 
        }
        if(Auth::check()){
            if(Core::role(Auth::user())->code != 'teacher'){
                if(Core::role(Auth::user())->code != 'admin'){
                    Auth::logout();
                    return redirect()->route('login'); 
                }  
            }
        }
        return $next($request);
    }
}

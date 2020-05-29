<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\Model\UserRole;
use App\Model\Role;
use App\Http\Controllers\Core\Core;

class AdminMiddleware
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
        $request->session()->forget('student_code');
        $request->session()->forget('token');
        if(!Auth::check()){
            return redirect()->route('login'); 
        }
        if(Auth::check()){
            if(Core::role(Auth::user())->code != 'admin'){
                Auth::logout();
                return redirect()->route('login'); 
            }
        }
        return $next($request);
    }
}

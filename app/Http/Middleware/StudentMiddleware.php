<?php

namespace App\Http\Middleware;

use Closure;
use App\Model\Students;
use Auth;

class StudentMiddleware
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
        Auth::logout();
        if (!$request->session()->has('student_code') && !$request->session()->has('token')) {
            $request->session()->forget('student_code');
            $request->session()->forget('token');
            return redirect()->route('student-login-view');
        }
        $studentCode  = $request->session()->get('student_code');
        $studentToken = $request->session()->get('token');
        $student = Students::where('student_code', $studentCode)
                            ->where('token', $studentToken)
                            ->first();
        if(!$student){
            $request->session()->forget('student_code');
            $request->session()->forget('token');
            return redirect()->route('student-login-view');
        }
        return $next($request);
    }
}

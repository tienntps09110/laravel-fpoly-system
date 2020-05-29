<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Core\Json;
use App\Http\Controllers\Core\Core;
use App\Http\Controllers\Core\View;
use Carbon\Carbon;
use App\User;
use Auth;

class Get extends Controller
{
    public function home(){
        // return view('teacher.get-class-subjects-today',[
        //     'Carbon'=>new Carbon
        // ]);
        return redirect()->route('get-class-subject-teacher-today');
    }
}

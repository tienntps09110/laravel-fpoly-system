<?php

namespace App\Http\Controllers\Department;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Core\Json;
use App\Http\Controllers\Core\Core;
use App\Http\Controllers\Core\View;
use App\User;
use Auth;

class Get extends Controller
{
    public function home(){
        return view('department.create-all');
        // return view(View::department('home'));
    }
}

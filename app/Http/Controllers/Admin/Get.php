<?php

namespace App\Http\Controllers\Admin;

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
        // return view('admin.1');
        return redirect()->route('department-home');
    }
}

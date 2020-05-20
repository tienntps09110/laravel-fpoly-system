<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Core\Json;
use App\Http\Controllers\Core\Core;
use App\Http\Controllers\Core\View;
use App\User;
use Auth;

class Get extends Controller
{
    // GET ALL USERS
    public function users(){
        $users = User::all();
        return view(View::admin('users'),['users'=>$users]);
    }
    // GET USER DETAIL
    public function user($uuid){
        return Core::role(Auth::user());
        $user = User::find($uuid);
        if(!$user){
            return Core::notFound();
        }
        return view(View::admin('user'),['user'=>$user]);
    }
}

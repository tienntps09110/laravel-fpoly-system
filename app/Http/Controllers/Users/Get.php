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
        $users = User::whereNotIn('uuid', [Auth::id()])->get();
        $arrayUsers = [];
        foreach($users as $user){
            $user->role = Core::role($user);
            $arrayUsers[] = $user;
        }
        return view(View::admin('users'),['users'=>$users]);
        // return $users;
    }
    // GET USER DETAIL
    public function user($uuid){
        $user = User::find($uuid);
        if(!$user){
            return Core::notFound();
        }
        $user->role = Core::role($user);
        return view(View::admin('user'),['user'=>$user]);
    }
}

<?php

namespace App\Http\Controllers\Core;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Core\View;
use App\Model\UserRole;
use App\Model\Role;

class Core extends Controller
{
    public static function parent(){
        return Auth::user()->user_parent_uuid;
    }
    public static function true(){
        return 'true';
    }
    public static function false(){
        return 'false';
    }
    public static function notFound(){
        return view(View::errors('404'));
    }
    public static function role($user){
        $user_role = UserRole::where('user_uuid', $user->uuid)->max('role_id');
        $role = Role::find($user_role);
        return $role;
    }
}
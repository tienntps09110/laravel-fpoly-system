<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;

class CoreUsers extends Controller
{
    // CREATE USER
    public static function create($data){
        $user = new User;
        $user->user_name        = $data->user_name;
        $user->user_parent_uuid = $data->user_parent_uuid;
        $user->password         = Hash::make($data->password);
        $user->full_name        = $data->full_name;
        $user->phone_number     = $data->phone_number;
        $user->email            = $data->email;
        $user->avatar_img_path  = $data->avatar_img_path;
        $user->soft_deleted     = $data->soft_deleted;
        $user->save();
        return $user;
    }
    // 
}

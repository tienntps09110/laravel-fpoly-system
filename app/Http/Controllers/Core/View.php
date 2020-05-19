<?php

namespace App\Http\Controllers\Core;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class View extends Controller
{
    public static function auth(String $key){
        $arrayViews = [
            'login'=> 'auth.login'
        ];
        return $arrayViews[$key];
    }
    public static function users(String $key){
        $arrayViews = [
            'users' => 'users.users',
            'user'  =>'users.user'
        ];
        return $arrayViews[$key];
    }
    public static function errors(String $key){
        $arrayViews = [
            '404' => 'errors.404'
        ];
        return $arrayViews[$key];
    }
}

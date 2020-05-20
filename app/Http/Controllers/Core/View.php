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
    public static function errors(String $key){
        $arrayViews = [
            '404' => 'errors.404'
        ];
        return $arrayViews[$key];
    }
    public static function admin(String $key){
        $arrayViews = [
            'home' => 'admin.home',
            'create-user'=>'admin.create-user',
            'users' => 'admin.users',
            'user'  =>'admin.user'
        ];
        return $arrayViews[$key];
    }
    public static function teacher(String $key){
        $arrayViews = [
            'home' => 'teacher.home'
        ];
        return $arrayViews[$key];
    }
    public static function department(String $key){
        $arrayViews = [
            'home' => 'department.home'
        ];
        return $arrayViews[$key];
    }
    public static function collaboration(String $key){
        $arrayViews = [
            'home' => 'collaboration.home'
        ];
        return $arrayViews[$key];
    }
}

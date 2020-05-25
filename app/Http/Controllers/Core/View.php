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
            'home'          => 'admin.home',
            'create-user'   =>'admin.create-user',
            'users'         => 'admin.users',
            'user'          =>'admin.user',
            'update-user'   =>'admin.update-user'
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
            'home'                  => 'department.home',
            'create-student'        => 'department.create-students',
            'create-teacher'        => 'department.create-teachers',
            'get-students'          => 'department.get-students',
            'get-student'           => 'department.get-student',
            'update-student'        => 'department.update-student',
            'create-class'          => 'department.create-class',
            'update-class'          => 'department.update-class',
            'get-class'             => 'department.get-class',
            'get-class-detail'      => 'department.get-class-detail',
            'create-subject'        => 'department.create-subject',
            'get-subjects'          => 'department.get-subjects',
            'get-subject'           => 'department.get-subject',
            'update-subject'        => 'department.update-subject',
            'create-class-subject'  => 'department.create-class-subject',
            'get-class-subjects'    => 'department.get-class-subjects'
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

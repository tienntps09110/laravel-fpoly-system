<?php

namespace App\Http\Controllers\Route;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Get extends Controller
{
    public function home(){
        $auth = Get::auth();
        $users = Get::users();
        $classM = Get::classM();
        $students = Get::students();
        $subjects = Get::subjects();
        $classSubjects = Get::classSubjects();

        return view('welcome',[
            'auth'=> $auth,
            'users'=> $users,
            'classM'=> $classM,
            'students'=>$students,
            'subjects'=> $subjects,
            'classSubjects'=> $classSubjects
        ]);
    }
    
    // Route auth
    public static function auth(){
        return [
            [
                "name"  => 'LOGIN',
                'method'=> 'GET',
                'route'   => 'login'
            ],
            [
                "name"  => 'LOGOUT',
                'method'=> 'POST',
                'route'   => 'logout'
            ]
        ];
    }
    // Route users
    public static function users(){
        return [
            // [
            //     "name"  => 'HOME',
            //     'method'=> 'GET',
            //     'route'   => 'admin-home'
            // ],
            [
                "name"  => 'GET ALL USERS',
                'method'=> 'GET',
                'route'   => 'get-users'
            ],
            [
                "name"  => 'GET DETAIL USER',
                'method'=> 'GET',
                'route'   => 'get-user'
            ],
            [
                "name"  => 'CREATE USER',
                'method'=> 'GET',
                'route'   => 'create-user-view'
            ],
            [
                "name"  => 'UPDATE USER',
                'method'=> 'GET',
                'route'   => 'update-user-view'
            ],
            [
                "name"  => 'DELETE USER',
                'method'=> 'DELETE',
                'route'   => 'delete-user'
            ],
            [
                "name"  => 'CREATE TEACHER VIEW',
                'method'=> 'GET',
                'route'   => 'create-teachers-excel'
            ],
        ];
    }
    // Route class
    public static function classM(){
        return [
            // [
            //     "name"  => 'HOME',
            //     'method'=> 'GET',
            //     'route'   => 'department-home'
            // ],
            [
                "name"  => 'CREATE CLASS VIEW',
                'method'=> 'GET',
                'route'   => 'create-class-view'
            ],
            [
                "name"  => 'GET ALL CLASS',
                'method'=> 'GET',
                'route'   => 'get-class'
            ],
            [
                "name"  => 'GET DETAIL CLASS',
                'method'=> 'GET',
                'route'   => 'get-class-detail'
            ],
            [
                "name"  => 'UPDATE CLASS VIEW',
                'method'=> 'GET',
                'route'   => 'update-class-view'
            ],
            [
                "name"  => 'DELETE CLASS',
                'method'=> 'DELETE',
                'route'   => 'delete-class'
            ]
        ];
    }
    // Route student
    public static function students(){
        return [
            [
                "name"  => 'CREATE STUDENT VIEW',
                'method'=> 'GET',
                'route'   => 'create-student-excel'
            ],
            [
                "name"  => 'GET ALL STUDENT',
                'method'=> 'GET',
                'route'   => 'get-students'
            ],
            [
                "name"  => 'GET DETAIL STUDENT',
                'method'=> 'GET',
                'route'   => 'get-student'
            ],
            [
                "name"  => 'UPDATE STUDENT VIEW',
                'method'=> 'GET',
                'route'   => 'update-student'
            ],
            [
                "name"  => 'DELETE STUDENT',
                'method'=> 'DELETE',
                'route'   => 'delete-student'
            ],
        ];
    }
    // Route subject
    public static function subjects(){
        return [
            [
                "name"  => 'CREATE SUBJECT VIEW',
                'method'=> 'GET',
                'route'   => 'create-subject-view'
            ],
            [
                "name"  => 'GET ALL SUBJECTS',
                'method'=> 'GET',
                'route'   => 'get-subjects'
            ],
            [
                "name"  => 'GET DETAIL SUBJECTS',
                'method'=> 'GET',
                'route'   => 'get-subject'
            ],
            [
                "name"  => 'UPDATE SUBJECT',
                'method'=> 'GET',
                'route'   => 'update-subject-view'
            ],
            [
                "name"  => 'DELETE SUBJECT',
                'method'=> 'DELETE',
                'route'   => 'delete-subject'
            ],
        ];
    }
    // Route subject
    public static function classSubjects(){
        return [
            [
                "name"  => 'CREATE CLASS SUBJECT VIEW',
                'method'=> 'GET',
                'route'   => 'create-class-subject-view'
            ],
            [
                "name"  => 'GET ALL CLASS SUBJECTS',
                'method'=> 'GET',
                'route'   => 'get-class-subjects'
            ],
            [
                "name"  => 'GET DETAIL CLASS SUBJECT',
                'method'=> 'GET',
                'route'   => 'get-class-subject'
            ],
        ];
    }
}

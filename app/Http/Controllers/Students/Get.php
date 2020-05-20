<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Core\Core;
use App\Http\Controllers\Core\View;
use App\Model\Students;
use App\Model\ClassM;
use Auth;
use App\User;

class Get extends Controller
{
    public function students(){
        $students = Students::where('soft_deleted', Core::false())->get();
        $arrayStudents = [];
        foreach($students as $student){
            $class = ClassM::find($student->class_id);
            $student->class = $class;
            $arrayStudents[] = $student;
        }
        return view(View::department('get-students'), ['students'=>$arrayStudents]);
    }
    public function student($id){
        $student = Students::where('id', $id)->first();
        if(!$student){
            return Core::notFound();
        }
        $class = ClassM::find($student->class_id);
        $student->class = $class;
        return view(View::department('get-student'), ['student'=>$student]);
    }
}

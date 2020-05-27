<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Students;
use Illuminate\Support\Facades\Hash;

class CoreStudents extends Controller
{
    public static function create($data){
        $student = new Students;
        $student->student_code      = $data->student_code;
        $student->password          = Hash::make(1);
        $student->full_name         = $data->full_name;
        $student->phone_number      = $data->phone_number;
        $student->email             = $data->email;
        $student->avatar_img_path   = $data->avatar_img_path;
        $student->class_id          = $data->class_id;
        $student->user_created_uuid = $data->user_created_uuid;
        $student->soft_deleted      = $data->soft_deleted;
        $student->save();
        return $student;
    }
}

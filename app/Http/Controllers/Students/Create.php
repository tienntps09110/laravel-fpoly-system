<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Core\Json;
use App\Http\Controllers\Core\Core;
use App\Http\Controllers\Core\View;
use App\Http\Controllers\Students\CoreStudents;
use App\Imports\Students\StudentsImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Str;
use Auth;
use App\User;
use App\Model\Students;
use App\Model\ClassM;

class Create extends Controller
{
    public function studentsView(){
        return view(View::department('create-student'));
    }
    public function studentsPost(Request $req){
        $req->validate([
            'excel'=>'required | min:1 | max:255'
        ]);

        $arrayError = [];
        $arrayStudents = Excel::toArray(new StudentsImport, $req->excel)[0];

        for($i = 1; $i <= count($arrayStudents) - 1; $i++){
            $data = (object) [
                'student_code'      => $arrayStudents[$i][0],
                'full_name'         => $arrayStudents[$i][1],
                'phone_number'      => $arrayStudents[$i][2],
                'email'             => $arrayStudents[$i][3],
                'class_code'        => Str::lower($arrayStudents[$i][4]),
                'class_id'          => '',
                'avatar_img_path'   => "https://robohash.org/".$arrayStudents[$i][0] ."?set=set4",
                'soft_deleted'      => Core::false(),
                'user_created_uuid' => Core::parent()
            ];
            $userNameCheck = Students::where('student_code', $data->student_code)->first();
            if($userNameCheck){
                $arrayError[$data->student_code] = "$data->student_code: MSSV đã tồn tại";
                continue;
            }
            $class = ClassM::where('code', $data->class_code)->first();
            if(!$class){
                $arrayError[$data->student_code] = "$data->student_code: Lớp không tồn tại";
                continue;
            }
            $data->class_id = $class->id;
            $user = CoreStudents::create($data);
        }
        
        if(count($arrayError) != 0){
            return redirect()->back()->withErrors($arrayError);
        }
        return Core::toBack($this->success, 'Tạo tất cả sinh viên từ file xlsx thành công');
    }
}

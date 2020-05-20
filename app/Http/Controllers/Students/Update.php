<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Core\Core;
use App\Http\Controllers\Core\View;
use Illuminate\Support\Str;
use App\Model\Students;
use App\Model\ClassM;
use Auth;
use App\User;

class Update extends Controller
{
    public function studentView($id){
        $student = Students::find($id);
        return view(View::department('update-student'), ['student'=>$student]);
    }
    public function studentPut(Request $req){
        $req->validate([
            'id'                => 'required | min:1 | max:255',
            'full_name'         => 'required | min:1 | max:255',
            'phone_number'      => 'required | min:1 | max:255',
            'email'             => 'required | min:1 | max:255',
            'avatar_img_path'   => 'min:1 | max:255'
        ]);
        $student = Students::find($req->id);
        if(!$student){
            return Core::toBack($this->danger, 'Không tìm thấy sinh viên yêu cầu');
        }
        $full_name = $req->full_name?$req->full_name:$student->full_name;
        $phone_number = $req->phone_number?$req->phone_number:$student->phone_number;
        $email = $req->email?$req->email:$student->email;
        $avatar_img_path = $student->avatar_img_path;
        
        if($req->avatar_img_path){
            $tmpName = $_FILES["avatar_img_path"]["tmp_name"];
            $typeImage = Str::afterLast($_FILES["avatar_img_path"]['type'], '/');
            $name = public_path() .'/images/students/'.$student->student_code .Str::random(15) .'.' .$typeImage;
            $avatar_img_path = 'images/students/'.$student->student_code .Str::random(15) .'.' .$typeImage;
            move_uploaded_file($tmpName, $name);
        }
        $student->full_name = $full_name;
        $student->phone_number = $phone_number;
        $student->email = $email;
        $student->avatar_img_path = $avatar_img_path;
        $student->save();
        
        return Core::toBack($this->success, 'Cập nhật thông tin thành công');
    }
}

<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Core\Core;
use App\Http\Controllers\Core\View;
use App\Http\Controllers\Core\Json;
use Illuminate\Support\Str;
use Validator;
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
        $validator = Validator::make($req->all(),[
            'id'                => 'required | min:1 | max:255',
            'full_name'         => 'required | min:1 | max:255',
            'phone_number'      => 'required | min:1 | max:255',
            'email'             => 'required | min:1 | max:255',
            'sex'               => 'required | min:1 | max:255',
            'address'           => 'required | min:1 | max:255',
            'avatar_img_path'   => 'max: 30000'
        ]);
        if ($validator->fails()) {
            return Json::getMess($validator->errors(), 422);
        }
        // return $req;
        $student = Students::find($req->id);
        if(!$student){
            // return Core::toBack($this->danger, 'Không tìm thấy sinh viên yêu cầu');
            return Json::getMess('Không tìm thấy sinh viên yêu cầu', 422);
        }
        $full_name = $req->full_name?$req->full_name:$student->full_name;
        $sex = $req->sex?$req->sex:'Không xác định';
        $phone_number = $req->phone_number?$req->phone_number:$student->phone_number;
        $email = $req->email?$req->email:$student->email;
        $address = $req->address?$req->address:$student->address;
        $avatar_img_path = $student->avatar_img_path;

        if($req->avatar_img_path != 'null'){
            $tmpName = $_FILES["avatar_img_path"]["tmp_name"];
            $typeImage = Str::afterLast($_FILES["avatar_img_path"]['type'], '/');
            $name = '/images/students/'.$student->student_code .Str::random(15) .'.' .$typeImage;
            $avatar_img_path = $name;
            move_uploaded_file($tmpName, public_path() .$name);
        }
        $student->full_name = $full_name;
        $student->sex = $sex;
        $student->phone_number = $phone_number;
        $student->email = $email;
        $student->address = $address;
        $student->avatar_img_path = $avatar_img_path;
        $student->save();
        
        // return Core::toBack($this->success, 'Cập nhật thông tin thành công');
        return Json::getMess('Cập nhật thông tin thành công', 200);
    }
}

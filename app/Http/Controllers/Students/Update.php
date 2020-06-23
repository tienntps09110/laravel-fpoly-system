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
            'full_name'         => 'required | min:5 | max:255',
            'phone_number'      => 'required | min:9 | max:255',
            'email'             => 'required | email | min:5 | max:255',
            'sex'               => 'required | min:1 | max:255',
            'address'           => 'required | min:1 | max:1000',
            'avatar_img_path'   => 'max: 30000'
        ], [
            'full_name.required' => 'Họ và tên không được bỏ trống',
            'full_name.min' => 'Họ và tên phải lớn hơn năm kí tự',
            'phone_number.required' => 'Số điện thoại không được bỏ trống',
            'phone_number.min' => 'Số điện thoại phải lớn hơn chín kí tự',
            'email.required' => 'Email không được bỏ trống',
            'email.min' => 'Email phải lớn hơn 5 kí tự',
            'address.required' => 'Địa chỉ không được bỏ trống',
            'address.min' => 'Địa chỉ phải lớn hơn một kí tự',
            'avatar_img_path.max' => 'Ảnh phải nhỏ hơn 30mb',
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

<?php

namespace App\Http\Controllers\Subjects;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Core\Core;
use App\Http\Controllers\Core\Json;
use App\Http\Controllers\Core\View;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Auth;
use App\User;
use App\Model\Subjects;
use Validator;

class Create extends Controller
{
    public function subjectView(){
        $data = [
            'hehe'=>'hada',
            'daas'=> 'sadsad'
        ];
        return view(View::department('create-subject'), ['data'=>$data]);
    }
    public function subjectPost(Request $req){
        $validator = Validator::make($req->all(), [
            'name'      => 'required | min:5 | max:255',
            'code'      => 'required | min:5 | max:255',
            'day_fail'  => 'required | min:1 | max:255'
        ], [
            'name.required' => 'Tên môn học không được bỏ trống',
            'name.min' => 'Tên môn học phải lớn hơn năm kí tự',
            'code.required' => 'Mã môn học không được bỏ trống',
            'code.min' => 'Mã môn học phải lớn hơn năm kí tự',
            'day_fail.required' => 'Ngày vắng tối đa không được bỏ trống',
            'day_fail.min' => 'Ngày vắng tối đa phải lớn hơn 1 kí tự'
        ]);
        if ($validator->fails()) {
            return Json::getMess($validator->errors(), 422);
        }
        $checkSubject = Subjects::where('code', $req->code)->first();
        if($checkSubject){
            // return Core::toBack($this->danger, 'Mã môn học đã tồn tại');
            return Json::getMess('Mã môn học đã tồn tại', 422);
        }
        
        $subject = new Subjects;
        $subject->name = $req->name;
        $subject->code = Str::lower(preg_replace('/\s+/', '_', $req->code));
        $subject->days_fail = $req->day_fail;
        $subject->soft_deleted = Core::false();
        $subject->save();
        // return Core::toBack($this->success, 'Tạo môn học thành công');
        return Json::getMess('Tạo môn học thành công', 200);
        
    }
}

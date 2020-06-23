<?php

namespace App\Http\Controllers\ClassC;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Core\Core;
use App\Http\Controllers\Core\Json;
use App\Http\Controllers\Core\View;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Auth;
use App\Model\Students;
use App\User;
use App\Model\ClassM;
use Validator;

class Create extends Controller
{
    public function classView(){
        return view(View::department('create-class'));
    }
    public function classPost(Request $req){
        $validator = Validator::make($req->all(), [
            'name'      => 'required | min:5 | max:255',
            'code'      => 'required | min:5 | max:255',
            'time_start'=> 'required | min:1 | max:255',
            'time_end'  => 'required | min:1 | max:255'
        ], [
            'name.required' => 'Tên lớp không được bỏ trống',
            'name.min' => 'Tên lớp phải lớn hơn năm kí tự',
            'code.required' => 'Mã lớp không được bỏ trống',
            'code.min' => 'Mã lớp phải lớn hơn năm kí tự',
            'time_start.required' => 'Thời gian bắt đầu không được bỏ trống',
            'time_start.min' => 'Thời gian bắt đầu phải lớn hơn 1 kí tự',
            'time_end.required' => 'Thời gian kết thúc không được bỏ trống',
            'time_end.min' => 'Thời gian kết thúc phải lớn hơn 1 kí tự'
        ]);
        if ($validator->fails()) {
            return Json::getMess($validator->errors(), 422);
        }
        $classCheck = ClassM::where('code', $req->code)->first();
        if($classCheck){
            // return Core::toBack($this->danger, 'Mã lớp đã tồn tại');
            return Json::getMess('Mã lớp đã tồn tại', 422);
        }
        if($req->time_end < $req->time_start){
            return Json::getMess('Thời gian kết thúc không thể nhỏ hơn thời gian bắt đầu', 422);
        }
        $class = new ClassM;
        $class->name = $req->name;
        $class->code = Str::lower(preg_replace('/\s+/', '_', Core::vnToEn($req->code)));
        $class->time_start = $req->time_start .' ' .Carbon::now()->toTimeString();
        $class->time_end   = $req->time_end .' ' .Carbon::now()->toTimeString();
        $class->soft_deleted = Core::false();
        $class->save();
        // return Core::toBack($this->success, 'Tạo lớp thành công');
        Core::pushRealTime('collaboration-component-count-all');
        return Json::getMess('Tạo lớp thành công');
    }
    
}

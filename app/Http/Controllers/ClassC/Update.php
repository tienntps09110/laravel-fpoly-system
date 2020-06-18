<?php

namespace App\Http\Controllers\ClassC;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Core\Core;
use App\Http\Controllers\Core\View;
use App\Http\Controllers\Core\Json;
use Illuminate\Support\Str;
use Auth;
use Validator;
use Carbon\Carbon;
use App\Model\Students;
use App\User;
use App\Model\ClassM;

class Update extends Controller
{
    public function classView($id){
        $classMs = ClassM::where('id', $id)
                        ->where('soft_deleted', Core::false())
                        ->first();
        if(!$classMs){
            return Core::notFound();
        }
        return view(View::department('update-class'), [
            'classMs'=>$classMs,
            'Carbon'=>new Carbon
        ]);
    }
    public function classPut(Request $req){
        $validator = Validator::make($req->all(), [
            'id'            => 'required | min:1 | max:255',
            'code'          => 'required | min:1 | max:255',
            'name'          => 'required | min:1 | max:255',
            'time_start'    => 'required | min:1 | max:255',
            'time_end'      => 'required | min:1 | max:255'
        ]);
        if ($validator->fails()) {
            return Json::getMess($validator->errors(), 422);
        }
        // return $req;
        $classMs = ClassM::where('id', $req->id)
                        ->where('soft_deleted', Core::false())
                        ->first();
        if(!$classMs){
            return Json::getMess('Không tìm thấy lớp cần cập nhật', 422);
        }
        if($req->time_end < $req->time_start){
            return Json::getMess('Thời gian kết thúc không thể nhỏ hơn thời gian bắt đầu', 422);
        }
        $code = $req->code?$req->code: $classMs->code;
        $classMs->code = Str::lower(preg_replace('/\s+/', '_', $code));
        $classMs->name = $req->name?$req->name:$classMs->name;
        $classMs->time_start = $req->time_start?$req->time_start: $classMs->time_start;
        $classMs->time_end = $req->time_end?$req->time_end: $classMs->time_end;
        $classMs->save();
        return Json::getMess('Cập nhật thành công');
    }
}

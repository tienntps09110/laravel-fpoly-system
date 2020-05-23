<?php

namespace App\Http\Controllers\ClassC;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Core\Core;
use App\Http\Controllers\Core\View;
use Illuminate\Support\Str;
use Auth;
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
        return view(View::department('update-class'), ['classMs'=>$classMs]);
    }
    public function classPut(Request $req){
        $req->validate([
            'id'            => 'required | min:1 | max:255',
            'code'          => 'required | min:1 | max:255',
            'time_start'    => 'required | min:1 | max:255',
            'time_end'      => 'required | min:1 | max:255'
        ]);
        $classMs = ClassM::where('id', $req->id)
                        ->where('soft_deleted', Core::false())
                        ->first();
        if(!$classMs){
            return Core::toBack($this->danger, 'Không tìm thấy lớp cần cập nhật');
        }
        $classMs->code = $req->code?$req->code: $classMs->code;
        $classMs->time_start = $req->time_start?$req->time_start: $classMs->time_start;
        $classMs->time_end = $req->time_end?$req->time_end: $classMs->time_end;
        $classMs->save();
        return Core::toBack($this->success, 'Cập nhật thành công');

    }
}

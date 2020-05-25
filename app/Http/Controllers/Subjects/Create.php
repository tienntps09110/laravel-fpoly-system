<?php

namespace App\Http\Controllers\Subjects;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Core\Core;
use App\Http\Controllers\Core\View;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Auth;
use App\User;
use App\Model\Subjects;

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
        $req->validate([
            'name' => 'required | min:1 | max:255',
            'code' => 'required | min:1 | max:255'
        ]);
        $checkSubject = Subjects::where('code', $req->code)->first();
        if($checkSubject){
            return Core::toBack($this->danger, 'Mã môn học đã tồn tại');
        }
        
        $subject = new Subjects;
        $subject->name = $req->name;
        $subject->code = Str::lower($req->code);
        $subject->soft_deleted = Core::false();
        $subject->save();
        return Core::toBack($this->success, 'Tạo môn học thành công');
    }
}

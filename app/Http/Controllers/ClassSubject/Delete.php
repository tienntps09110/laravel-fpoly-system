<?php

namespace App\Http\Controllers\ClassSubject;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Core\Core;
use App\Http\Controllers\Core\View;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Auth;
use App\User;
use App\Model\ClassSubject;

class Delete extends Controller
{
    public function classSubject(Request $req){
        $req->validate([
            'id'=> 'required | min:1 | max:255'
        ]);
        $classSubjectCheck = ClassSubject::where('id', $req->id)
                                        ->where('soft_deleted', Core::false())
                                        ->first();
        if(!$classSubjectCheck){
            return Core::toBack($this->dannger, 'Không tìm thấy môn học của lớp');
        }
        $classSubjectCheck->soft_deleted = Core::true();
        $classSubjectCheck->save();
        return Core::toBack($this->success, 'Xóa lớp học thành công'); 
    }
}

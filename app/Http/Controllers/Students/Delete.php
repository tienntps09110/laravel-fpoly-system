<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Core\Core;
use App\Http\Controllers\Core\View;
use Auth;
use App\Model\Students;
use App\User;

class Delete extends Controller
{
    public function student(Request $req){
        $req->validate([
            'id'=> 'required | min:1 | max:255'
        ]);
        $student = Students::find($req->id);
        if(!$student){
            return Core::toBack($this->danger, 'Không tìm thấy sinh viên yêu cầu');
        }
        $student->soft_deleted = Core::true();
        $student->save();
        return Core::toBack($this->success, "Xóa sinh viên thành công");
    }
}

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

class Delete extends Controller
{
    public function classM(Request $req){
        $req->validate([
            'id'=> 'required | min:1 | max:255'
        ]);
        $classCheck = ClassM::find($req->id);
        if(!$classCheck){
            return Core::toBack($this->danger, 'Không tìm thấy lớp cần xóa');
        }
        $classCheck->soft_deleted = Core::true();
        $classCheck->save();
        return Core::toBack($this->success, 'Xóa lớp thành công'); 
    }
}

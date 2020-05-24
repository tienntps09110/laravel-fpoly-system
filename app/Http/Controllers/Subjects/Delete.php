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

class Delete extends Controller
{
    public function subject(Request $req){
        $req->validate([
            'id' => 'required | min:1 | max:255'
        ]);
        $subject = Subjects::find($req->id);
        if(!$subject){
            return Core::toBack($this->danger, 'Không tìm thấy môn học cần xóa');
        }
        $subject->soft_deleted = Core::false();
        $subject->save();
        return Core::toBack($this->success, 'Xóa môn học thành công');
    }
}

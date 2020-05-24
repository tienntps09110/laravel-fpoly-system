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


class Update extends Controller
{
    public function subjectView($id){
        $subject = Subjects::findOrFail($id);
        return view(View::department('update-subject'), [
            'subject' => $subject
        ]);
    }
    public function subject(Request $req){
        $req->validate([
            'id'   => 'required | min:1 | max:255',
            'name' => 'required | min:1 | max:255',
            'code' => 'required | min:1 | max:255'
        ]);

        $subject = Subjects::find($req->id);
        if(!$subject){
            return Core::toBack($this->danger, 'Không tìm thấy môn học cần xóa');
        }

        $subject->name = $req->name?$req->name:$subject->name;
        $subject->code = $req->code?$req->code:$subject->code;
        $subject->save();

        return Core::toBack($this->success, 'Cập nhật môn học thành công');
    }
}

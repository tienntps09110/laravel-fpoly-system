<?php

namespace App\Http\Controllers\DaysClassSubject;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Core\Core;
use App\Http\Controllers\Core\View;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Auth;
use App\User;
use App\Model\DaysClassSubject;

class Update extends Controller
{
    public function daysClassSubjectView(){
        return view(View::department('update-day-class-subject'));
    }
    public function daysClassSubject(Request $req){
        $req->validate([
            'id'                => 'required | min:1 | max:255',
            'class_subject_id'  => 'required | min:1 | max:255',
            'user_manager_uuid' => 'required | min:1 | max:255'
        ]);
        $daysClassSubject = DaysClassSubject::where('id', $req->id)
                                            ->where('checked', Core::false())
                                            ->first();
        if(!$daysClassSubject){
            return Core::toBack($this->danger, 'Ngày không tồn tại hoặc đã hết hạn');
        }
        $daysClassSubject->user_manager_uuid = $req->user_manager_uuid;
        $daysClassSubject->save();
        return Core::toBack($this->success, 'Thay đổi giáo viên dạy thế thành công');
    }
}

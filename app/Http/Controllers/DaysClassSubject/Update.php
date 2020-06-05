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
use App\Model\ClassSubject;

class Update extends Controller
{
    public function daysClassSubjectView($id){
        $dayClassSubject = DaysClassSubject::where('id', $id)
                                            ->firstOrFail();
        $users = User::where('soft_deleted', Core::false())
                        ->get();
        $teachers = [];
        // return $dayClassSubject;
        foreach($users as $user){
            $role = Core::role($user);
            if($role->code == 'teacher'){
                // return $user;
                $checkTeacher = Update::checkTeacher($dayClassSubject, $user);
                if($checkTeacher){
                    $teachers[] = $user;
                }
            }
        }
        return view(View::department('update-day-class-subject'),[
            'dayClassSubject'=> $dayClassSubject,
            'teachers'       => $teachers
        ]);
    }
    // CHECK TEACHER
    private static function checkTeacher($dataDay, $teacher){
        $dayClassSubjectTeacher = DaysClassSubject::where('user_manager_uuid', $teacher->uuid)
                                        ->where('date', $dataDay->date)
                                        ->first();
        if(!$dayClassSubjectTeacher){
            return true;
        }
        $classSubject = ClassSubject::where('id', $dataDay->class_subject_id)
                                    ->where('soft_deleted', Core::false())
                                    ->first();
        $classSubjectTeacher = ClassSubject::where('id', $dayClassSubjectTeacher->class_subject_id)
                                    ->where('soft_deleted', Core::false())
                                    ->first();
        if( $classSubject && $classSubjectTeacher){
            if($classSubjectTeacher->study_time_id != $classSubject->study_time_id){
                return true;
            }
            return false;
        }
    }
    public function daysClassSubject(Request $req){
        $req->validate([
            'id'                => 'required | min:1 | max:255',
            'class_subject_id'  => 'required | min:1 | max:255',
            'user_manager_uuid' => 'required | min:1 | max:255'
        ]);
        $teacherCheck = User::where('uuid', $req->user_manager_uuid)
                            ->where('soft_deleted', Core::false())
                            ->first();
        if(!$teacherCheck){
            return Core::toBack($this->danger, 'Không tìm thấy giáo viên, vui lòng thử lại');
        }
        $daysClassSubject = DaysClassSubject::where('id', $req->id)
                                            ->where('checked', Core::false())
                                            ->first();
        if(!$daysClassSubject || $daysClassSubject && $daysClassSubject->date < Carbon::now()->toDateString()){
            return Core::toBack($this->danger, 'Ngày không tồn tại hoặc đã hết hạn');
        }
        $daysClassSubject->user_manager_uuid = $req->user_manager_uuid;
        $daysClassSubject->save();
        return Core::toBack($this->success, 'Thay đổi giáo viên dạy thế thành công');
    }
}

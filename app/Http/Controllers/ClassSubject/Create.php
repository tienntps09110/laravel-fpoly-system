<?php

namespace App\Http\Controllers\ClassSubject;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Core\Core;
use App\Http\Controllers\Core\View;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Auth;
use App\Model\Students;
use App\User;
use App\Model\ClassSubject;
use App\Model\ClassM;
use App\Model\StudyTime;
use App\Model\Subjects;

class Create extends Controller
{
    public function classSubjectView(){
        $class      = ClassM::where('soft_deleted', Core::false())->get();
        $subjects   = Subjects::where('soft_deleted', Core::false())->get();
        $studyTime  = StudyTime::where('soft_deleted', Core::false())->get();
        $teachers   = User::where('soft_deleted', Core::false())->get();
        $arrayTeacher = [];
        foreach($teachers as $teacherDetail){
            if(Core::role($teacherDetail)->code == 'teacher'){
                // $teacherDetail->role = Core::role($teacherDetail);
                $arrayTeacher[] = $teacherDetail;
            }
        }
        return view(View::department('create-class-subject'), [
            'class'=>$class,
            'subjects' => $subjects,
            'studyTime'=> $studyTime,
            'teachers' => $arrayTeacher
        ]);
    }
    public function classSubjectPost(Request $req){
        $req->validate([
            'class_id'          => 'required | min:1 | max:255',
            'subject_id'        => 'required | min:1 | max:255',
            'teacher_id'        => 'required | min:1 | max:255',
            'study_time_id'     => 'required | min:1 | max:255',
            'datetime_start'    => 'required | min:1 | max:255',
            'datetime_end'      => 'required | min:1 | max:255'
        ]);
        $class = ClassM::where('id', $req->class_id)
                        ->where('soft_deleted', Core::false())
                        ->first();
        if(!$class){
            return Core::toBack($this->danger, 'Không tìm thấy lớp theo yêu cầu');
        }
        $subjects = Subjects::where('id', $req->subject_id)
                            ->where('soft_deleted', Core::false())
                            ->first();
        if(!$subjects){
            return Core::toBack($this->danger, 'Không tìm thấy môn học theo yêu cầu');
        }
        $studyTime  = StudyTime::where('id', $req->study_time_id)
                            ->where('soft_deleted', Core::false())
                            ->first();
        if(!$studyTime){
            return Core::toBack($this->danger, 'Không tìm thấy ca học theo yêu cầu');
        }
        $user  = User::where('uuid', $req->teacher_id)
                            ->where('soft_deleted', Core::false())
                            ->first();
        if(!$user){
            return Core::toBack($this->danger, 'Không tìm thấy giảng viên theo yêu cầu');
        }
        if($req->datetime_start > $req->datetime_end){
            return Core::toBack($this->danger, 'Thời gian kết thúc không thể nhỏ hơn thời gian bắt đầu');
        }
        $classSubject = new ClassSubject;
        $classSubject->class_id = $req->class_id;
        $classSubject->subject_id = $req->subject_id;
        $classSubject->study_time_id = $req->study_time_id;
        $classSubject->user_manager_uuid = $req->teacher_id;
        $classSubject->datetime_start = $req->datetime_start . ' ' .$studyTime->time_start;
        $classSubject->datetime_end = $req->datetime_end . ' ' .$studyTime->time_end;
        $classSubject->soft_deleted = Core::false();
        $classSubject->save();
        return Core::toBack($this->success, 'Tạo phân công giảng dạy thành công');
    }
}

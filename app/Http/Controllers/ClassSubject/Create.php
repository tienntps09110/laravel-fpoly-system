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
use App\Model\DaysClassSubject;


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
            'teacher_uuid'      => 'required | min:1 | max:255',
            'study_time_id'     => 'required | min:1 | max:255',
            'datetime_start'    => 'required | min:1 | max:255',
            'datetime_end'      => 'required | min:1 | max:255',
            'days_study'        => 'required | min:1 | max:255'
        ]);
        $arrayDaysStudy = $req->days_study;
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
        $user = User::where('uuid', $req->teacher_uuid)
                            ->where('soft_deleted', Core::false())
                            ->first();
        if(!$user){
            return Core::toBack($this->danger, 'Không tìm thấy giảng viên theo yêu cầu');
        }
        if($req->datetime_start > $req->datetime_end){
            return Core::toBack($this->danger, 'Thời gian kết thúc không thể nhỏ hơn thời gian bắt đầu');
        }
        $TimeCheck = ClassSubject::where('class_id', $req->class_id)
                                    ->where('study_time_id', $req->study_time_id)
                                    ->where('days_week', json_encode($arrayDaysStudy))    
                                    ->whereDate('datetime_end', '>', CarBon::now()->toDateString())
                                    ->get();
        foreach($TimeCheck as $TimeCheckDetail){
            if($req->datetime_start < $TimeCheckDetail->datetime_end){
                return Core::toBack($this->danger, 'Ca học của lớp trong khoảng thời gian đã có môn học');
            }
        }
        $SubjectCheck = ClassSubject::where('class_id', $req->class_id)
                                    ->where('subject_id', $req->subject_id)    
                                    ->whereDate('datetime_end', '>', CarBon::now()->toDateString())
                                    ->get();
        foreach($SubjectCheck as $SubjectCheckDetail){
            if($req->datetime_start < $SubjectCheckDetail->datetime_end){
                return Core::toBack($this->danger, 'Môn học đã có trong khoảng thời gian này');
            }
        }
        
        // DAYS STUDY
        $arrayDays = Create::dayTimeStudy($req->datetime_start, $req->datetime_end, $arrayDaysStudy);

        $TeacherCheck = ClassSubject::where('user_manager_uuid', $req->teacher_uuid)    
                                    ->where('study_time_id', $req->study_time_id)
                                    ->whereDate('datetime_end', '>', CarBon::now()->toDateString())
                                    ->orderByDesc('id')
                                    ->first();

        if($TeacherCheck){
            if($req->datetime_start <= $TeacherCheck->datetime_end
                && json_encode($arrayDaysStudy) == $TeacherCheck->days_week){
                return Core::toBack($this->danger, 'Giảng viên bận vào ca này trong khoảng thời gian này');
            }
        }

        $classSubject = new ClassSubject;
        $classSubject->class_id          = $req->class_id;
        $classSubject->subject_id        = $req->subject_id;
        $classSubject->study_time_id     = $req->study_time_id;
        $classSubject->user_manager_uuid = $req->teacher_uuid;
        $classSubject->days_week         = json_encode($arrayDaysStudy);
        $classSubject->datetime_start    = $req->datetime_start . ' ' .$studyTime->time_start;
        $classSubject->datetime_end      = $req->datetime_end . ' ' .$studyTime->time_end;
        $classSubject->soft_deleted      = Core::false();
        $classSubject->save();
        
        Create::insertDaysClassSubject($classSubject->id,$req->teacher_uuid, $arrayDays);

        return Core::toBack($this->success, 'Tạo phân công giảng dạy thành công');
    }

    // INSERT DAYS CLASS SUBJECT
    protected static function insertDaysClassSubject(String $class_subject_id, String $user_manager_uuid, Array $arrayDays){
        for($i = 0; $i < count($arrayDays); $i++){
            $insert = new DaysClassSubject;
            $insert->class_subject_id = $class_subject_id;
            $insert->user_manager_uuid = $user_manager_uuid;
            $insert->date = $arrayDays[$i];
            $insert->checked = Core::false();
            $insert->save();
        }
    }

    // GET DATE STUDY 
    protected static function dayTimeStudy(String $datetime_start, String $datetime_end, Array $arrayDays){
        $dateTimeStart = Carbon::parse($datetime_start);
        $dateTimeEnd = Carbon::parse($datetime_end);
        $dateCount = $dateTimeStart->diffInDays($dateTimeEnd);
        $arrayDaysStudy = [];
        for($i = 0; $i <= $dateCount; $i++){
            $date = Carbon::parse($datetime_start)->addDays($i);
            $day = $date->dayOfWeek;
            for($j = 0; $j < count($arrayDays); $j++){
                if($arrayDays[$j] == $day){
                    $arrayDaysStudy[] = $date->toDateString();
                }
            }
        }
        return $arrayDaysStudy;
    }
}

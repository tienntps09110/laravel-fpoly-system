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
    public function CheckCreateSubject(Request $req){
        $req->validate([
           'class_id'           => 'max:255',
           'subject_id'         => 'max:255',
           'study_id'           => 'max:255',
           'user_manager_uuid'  => 'max:255',
           'date_start'         => 'max:255',
           'date_end'           => 'max:255',
           'day_study'          => 'max:255',
           'function'           => 'required | max:1'
        ]);
        switch($req->function){
            case 1:
                return Create::checkSubject($req);
            break;
            case 2:
                return Create::checkTimeStudy($req);
            break;
            default:
                return "Not found function";
        }
        
    }
    // CHECK SUBJECT OF CLASS
    private static function checkSubject($data){
        $pluckSubjectId = ClassSubject::where('class_id', $data->class_id)
                            ->where('datetime_end', '>', Carbon::now())
                            ->pluck('subject_id')
                            ->toArray();
        $subjects = Subjects::whereNotIn('id', $pluckSubjectId)
                            ->get();
        return $subjects;
    }
    // CHECK TIME STUDY
    private static function checkTimeStudy($data){
        if($data->date_start > $data->date_end){
            return 'Ngày bắt đầu không thể nhỏ hơn ngày kết thúc';
        }
        if($data->date_start < Carbon::now() || $data->date_end < Carbon::now() ){
            return 'Không thể chọn ngày ở quá khứ';
        }
        $classSubjects = ClassSubject::where('class_id', $data->class_id)
                                    ->where('datetime_end', '>', Carbon::now())
                                    ->get();
        $pluckStudyId = [];

        foreach($classSubjects as $study){
            // GIUA
            if(
                $data->date_start > $study->datetime_start && 
                $data->date_end < $study->datetime_end
            ){
                $pluckStudyId[] = $study->study_time_id;
            }
            // NAM TRUOC VA GIUA
            elseif(
                $data->date_start < $study->datetime_start &&
                $data->date_end < $study->datetime_end
            ){
                $pluckStudyId[] = $study->study_time_id;
            }
            // NAM GIUA VA SAU
            elseif(
                $data->date_start > $study->datetime_start &&
                $data->date_start < $study->datetime_end &&
                $data->date_end > $study->datetime_end
            ){
                $pluckStudyId[] = $study->study_time_id;
            }
            // BAO GOM
            elseif(
                $data->date_start < $study->datetime_start &&
                $data->date_end > $study->datetime_end
            ){
                $pluckStudyId[] = $study->study_time_id;
            }
        }
        $studyTime = StudyTime::whereNotIn('id', $pluckStudyId)
                            ->get();
        return $studyTime;
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

        // CHECK TIME START <> END
        if($req->datetime_start > $req->datetime_end){
            return Core::toBack($this->danger, 'Thời gian kết thúc không thể nhỏ hơn thời gian bắt đầu');
        }

        // CHECK CLASS
        $class = ClassM::where('id', $req->class_id)
                        ->where('soft_deleted', Core::false())
                        ->first();
        if(!$class){
            return Core::toBack($this->danger, 'Không tìm thấy lớp theo yêu cầu');
        }

        // CHECK SUBJECT
        $subjects = Subjects::where('id', $req->subject_id)
                            ->where('soft_deleted', Core::false())
                            ->first();
        if(!$subjects){
            return Core::toBack($this->danger, 'Không tìm thấy môn học theo yêu cầu');
        }

        // CHECK STUDY TIME
        $studyTime  = StudyTime::where('id', $req->study_time_id)
                            ->where('soft_deleted', Core::false())
                            ->first();
        if(!$studyTime){
            return Core::toBack($this->danger, 'Không tìm thấy ca học theo yêu cầu');
        }

        // CHECK TEACHER
        $user = User::where('uuid', $req->teacher_uuid)
                            ->where('soft_deleted', Core::false())
                            ->first();
        if(!$user){
            return Core::toBack($this->danger, 'Không tìm thấy giảng viên theo yêu cầu');
        }

        // CHECK TIME TEACHER AND CLASS
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

        // CHECK SUBJECT AND TIME
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
        
        if($TeacherCheck && $req->datetime_start <= $TeacherCheck->datetime_end){
            $arrayTeacherDays = json_decode($TeacherCheck->days_week);
            for($i = 0; $i < count($arrayDaysStudy); $i++){
                for($j = 0; $j < count($arrayTeacherDays); $j++){
                    if($arrayDaysStudy[$i] == $arrayTeacherDays[$j]){
                        return Core::toBack($this->danger, 'Giảng viên bận vào ca này trong khoảng thời gian này');
                    }
                }
            }
        } 
        
        // INSERT DATA
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
        
        // INSERT DAYS STUDY
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

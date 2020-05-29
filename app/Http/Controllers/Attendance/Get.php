<?php

namespace App\Http\Controllers\Attendance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Core\Core;
use App\Http\Controllers\Core\View;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Auth;
use App\Model\Students;
use App\Model\StudyTime;
use App\Model\ClassSubject;
use App\Model\Attendance;
use DB;
class Get extends Controller
{
    public function attendanceView($classSubjectId, $dayStudyId){

        $classSubjectCheck =  ClassSubject::join('days_class_subject as dcs', 'class_subject.id', '=', 'dcs.class_subject_id')
                                ->where('class_subject.id', $classSubjectId)
                                ->where('dcs.id', $dayStudyId)                                        
                                ->where('class_subject.datetime_end', '>', Carbon::now()->toDateString())
                                ->where('class_subject.soft_deleted', Core::false())
                                ->select(
                                    'class_subject.id as class_subject_id',
                                    'class_subject.class_id',
                                    'dcs.id as dcs_id',
                                    'class_subject.study_time_id',
                                    'checked'
                                )
                                ->firstOrFail();
            
        // redirect to update attendance
        if($classSubjectCheck && $classSubjectCheck->checked == Core::true()){
            return redirect()->route('get-attendance-class-subject-update-today',[
                    'classSubjectId'=>$classSubjectCheck->class_subject_id,
                    'dayStudyId'=>$classSubjectCheck->dcs_id
                ]);
        }
        $classSubjectStudy = ClassSubject::where('id', $classSubjectId)->firstOrFail();
        
        // $dayStudyCheck = Attendance::where('days_class_subject_id', $classSubjectCheck->dcs_id)
        // ->first();
        
        // if($dayStudyCheck){
        //     return Core::notFound();
        // }
        
        $studyCheck = StudyTime::where('id', $classSubjectStudy->study_time_id)->first();
        $timeOut = Core::false();
        
        if($studyCheck){
            $now = Carbon::now()->toTimeString();
            if($now > Carbon::parse($studyCheck->time_start)->addMinutes($this->timeAttendance)->toTimeString()){
                // return Core::notFound();
                $timeOut = Core::true();

            }
        }
        $students = Students::where('class_id', $classSubjectCheck->class_id)
                            ->where('soft_deleted', Core::false())
                            ->get();
        
        return view('teacher.get-attendance-today', [
            'classSubject'=> $classSubjectCheck,
            'students'    => $students,
            'timeOut'     => $timeOut
        ]);
    }
    public function attendanceUpdateView($classSubjectId, $dayStudyId){

        $classSubjectCheck =  ClassSubject::join('days_class_subject as dcs', 'class_subject.id', '=', 'dcs.class_subject_id')
                                ->where('class_subject.id', $classSubjectId)
                                ->where('dcs.id', $dayStudyId)                                        
                                ->where('class_subject.datetime_end', '>', Carbon::now()->toDateString())
                                ->where('class_subject.soft_deleted', Core::false())
                                ->select(
                                    'class_subject.id as class_subject_id',
                                    'class_subject.class_id',
                                    'dcs.id as dcs_id',
                                    'class_subject.study_time_id'
                                )
                                ->firstOrFail();
        $classSubjectStudy = ClassSubject::where('id', $classSubjectId)->firstOrFail();
        
        $studyCheck = StudyTime::where('id', $classSubjectStudy->study_time_id)->first();
        
        $timeOut = Core::false();
        if($studyCheck){
            $now = Carbon::now()->toTimeString();
            if($now > Carbon::parse($studyCheck->time_start)->addMinutes($this->timeAttendance)->toTimeString()){
                // return Core::notFound();
                $timeOut = Core::true();
            }
        }
        $students = Students::join('attendance as at', 'students.id', '=', 'at.student_id')
                            ->where('at.days_class_subject_id', $dayStudyId)
                            ->where('class_id', $classSubjectCheck->class_id)
                            ->where('soft_deleted', Core::false())
                            ->select(
                                'students.id',
                                'students.student_code',
                                'students.full_name',
                                'students.avatar_img_path',
                                'at.checked'
                            )
                            ->orderBy('id')
                            ->get();
        return view('teacher.get-attendance-update-today', [
            'classSubject'=> $classSubjectCheck,
            'students'    => $students,
            'timeOut'     => $timeOut
        ]);
    }
}

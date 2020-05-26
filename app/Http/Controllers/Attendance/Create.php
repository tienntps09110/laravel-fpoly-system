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

class Create extends Controller
{
    public function attendance(Request $req){
        $req->validate([
            'attendance'            => 'required | min:1 | max:255',
            'days_class_subject_id' => 'required | min:1 | max:255',
            'class_id'              => 'required | min:1 | max:255',
            'study_time_id'         => 'required | min:1 | max:255',
        ]);
        $dayStudyCheck = Attendance::
                        where('days_class_subject_id', $req->days_class_subject_id)
                        ->first();
        if($dayStudyCheck){
            return Core::toBack($this->danger, 'Ngày học đã được điểm danh');
        }
        $studyCheck = StudyTime::where('id', $req->study_time_id)->first();
        if($studyCheck){
            $now = Carbon::now()->toTimeString();
            if($now > Carbon::parse($studyCheck->time_start)->addMinutes(30)->toTimeString()){
                return Core::toBack($this->danger, 'Đã hết giờ điểm danh');
            }
        }
        $studentsHave = Students::where('class_id', $req->class_id)
                            ->where('soft_deleted', Core::false())
                            ->whereIn('id', $req->attendance)
                            ->select('id')
                            ->get();
        $studentsNot = Students::where('class_id', $req->class_id)
                            ->where('soft_deleted', Core::false())
                            ->whereNotIn('id', $req->attendance)
                            ->select('id')
                            ->get();
        foreach($studentsHave as $studeH){
            $insert = new Attendance;
            $insert->student_id             = $studeH->id;
            $insert->days_class_subject_id  = $req->days_class_subject_id;
            $insert->checked                = Core::true();
            $insert->save();
        }
        foreach($studentsNot as $studeN){
            $insert = new Attendance;
            $insert->student_id             = $studeN->id;
            $insert->days_class_subject_id  = $req->days_class_subject_id;
            $insert->checked                = Core::false();
            $insert->save();
        }
        return Core::toBack($this->success, 'Điểm danh thành công');
    }
}

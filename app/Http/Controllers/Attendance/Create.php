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
use App\Model\DaysClassSubject;
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
        // return $req;
        $data = [
            'attendance'            => $req->attendance,
            'days_class_subject_id' => $req->days_class_subject_id,
            'class_id'              => $req->class_id,
            'study_time_id'         => $req->study_time_id
        ];

        $studyCheck = StudyTime::where('id', $req->study_time_id)->first();
        if($studyCheck){
            $now = Carbon::now()->toTimeString();
            if($now > Carbon::parse($studyCheck->time_start)->addMinutes($this->timeAttendance)->toTimeString()){
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
        $dayClassSubject = DaysClassSubject::find($req->days_class_subject_id);
        $updateFunction = Core::false();
        $createFunction = Core::false();
        if($dayClassSubject && $dayClassSubject->checked == 'true'){
            $updateFunction = Create::update($studentsHave, $studentsNot, $data);
            return Core::toBack($this->success, 'Cập nhật điểm danh thành công');
        }
        $createFunction = Create::create($studentsHave, $studentsNot, $data);
        $dayClassSubject->checked = Core::true();
        $dayClassSubject->save();
        return Core::toBack($this->success, 'Điểm danh thành công');
    }
    protected static function create($studentsHave, $studentsNot, $data){
        return Create::insert($studentsHave, $studentsNot, $data['days_class_subject_id']);
    }
    protected static function update($studentsHave, $studentsNot, $data){
         $deleteAttendance = Attendance::
                        where('days_class_subject_id', $data['days_class_subject_id'])
                        ->delete();
        return Create::insert($studentsHave, $studentsNot, $data['days_class_subject_id']);
    }
    // INSERT ATTENDANCE
    protected static function insert($studentsHave, $studentsNot, $dayClassSubjectId){
        foreach($studentsHave as $studeH){
            $insert = new Attendance;
            $insert->student_id             = $studeH->id;
            $insert->days_class_subject_id  = $dayClassSubjectId;
            $insert->checked                = Core::true();
            $insert->save();
        }
        foreach($studentsNot as $studeN){
            $insert = new Attendance;
            $insert->student_id             = $studeN->id;
            $insert->days_class_subject_id  = $dayClassSubjectId;
            $insert->checked                = Core::false();
            $insert->save();
        }
        return Core::true();
    }
}

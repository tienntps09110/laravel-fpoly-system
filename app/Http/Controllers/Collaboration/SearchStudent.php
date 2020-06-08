<?php

namespace App\Http\Controllers\Collaboration;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Core\Json;
use App\Http\Controllers\Core\Core;
use App\Model\Students;
use Carbon\Carbon;
use DB;
class SearchStudent extends Controller
{
    public function getSearchView(){
        return view('collaboration.search-student');
    }
    public function getSearch(Request $req){
        $req->validate([
            'student_code'=> 'required | min:1 | max:255'
        ]);
        $studentCheck = Students::where('student_code', $req->student_code)
                                ->select(
                                    'id',
                                    'student_code',
                                    'class_id',
                                    'full_name',
                                    'sex',
                                    'phone_number',
                                    'email',
                                    'avatar_img_path',
                                    'soft_deleted'
                                )
                                ->first();
        if(!$studentCheck){
            return Json::getMess('Không tìm thấy sinh viên yêu cầu', 404);
        }
        if($studentCheck->soft_deleted == Core::true()){
            return Json::getMess('Tài khoản đang bị khóa', 404);
        }
        $arraySubjectStudent = SearchStudent::getClassSubjects($studentCheck);

        return view('collaboration.ajax-info-student', [
            'studentSubjects' => $arraySubjectStudent,
            'student'         => $studentCheck
        ]);
    }

    // GET CLASS, SUBJECTS AND DAYS FAIL
    protected static function getClassSubjects($studentCheck){
        $classSubject = DB::table('class_subject as cs')
                        ->join('subjects as sj', 'cs.subject_id', '=', 'sj.id')
                        ->join('class as c', 'cs.class_id', '=', 'c.id')
                        ->where('cs.class_id', $studentCheck->class_id)
                        ->where('cs.datetime_end', '>', Carbon::now())
                        ->where('cs.soft_deleted', Core::false())
                        ->select(
                            'cs.id as class_subject_id',
                            'c.name as class_name',
                            'sj.name as subject_name',
                            'sj.days_fail as subject_days_fail',
                            'cs.datetime_start',
                            'cs.datetime_end'
                        )
                        ->get();
        $arraySubjectStudent = [];
        foreach($classSubject as $detailCS){
            $infoSubject = (object) [];
            $daysStudy = DB::table('days_class_subject as dcs')
                ->join('attendance as at', 'dcs.id', '=', 'at.days_class_subject_id')
                ->where('dcs.class_subject_id', $detailCS->class_subject_id)
                ->where('at.student_id', $studentCheck->id)
                ->where('at.checked', Core::true())
                ->count();
            $infoSubject->class_subject_id = $detailCS->class_subject_id;
            $infoSubject->class_name = $detailCS->class_name;
            $infoSubject->subject_name = $detailCS->subject_name;
            $infoSubject->subject_days_fail = $detailCS->subject_days_fail;
            $infoSubject->date_start = Carbon::parse($detailCS->datetime_start)->toDateString();
            $infoSubject->date_end = Carbon::parse($detailCS->datetime_end)->toDateString();
            $infoSubject->count_days_fail_now = $daysStudy;
            $arraySubjectStudent[] = $infoSubject;
        }
        return $arraySubjectStudent;
    }
}

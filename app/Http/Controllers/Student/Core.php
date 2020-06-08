<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Core\Core as CoreG;
use App\Model\Students;
use DB;
class Core extends Controller
{
    public static function user(){
        $studentCode  = session()->get('student_code');
        $studentToken = session()->get('token');

        $student = Students::where('student_code', $studentCode)
                            ->where('token', $studentToken)
                            ->first();
        return $student;
        
    }
    // GET CLASS SUBJECT
    public static function dbClassSubject(){
        $classSubjects = DB::table('class_subject as cs')
                ->join('class as c', 'cs.class_id' , '=', 'c.id')
                ->join('subjects as sj', 'cs.subject_id' , '=', 'sj.id')
                ->join('study_time as st', 'cs.study_time_id', '=', 'st.id')
                ->join('users as us', 'cs.user_manager_uuid', 'us.uuid')
                ->where('cs.soft_deleted', CoreG::false())
                ->select(
                    'cs.id',
                    'cs.class_id',
                    'c.name as class_name',
                    'c.code as class_code',
                    'cs.subject_id',
                    'sj.name as subject_name',
                    'sj.code as subject_code',
                    'sj.days_fail as subject_days_fail',
                    'st.name as study_time_name',
                    'cs.datetime_start',
                    'cs.datetime_end',
                    'cs.days_week',
                    'st.time_start as study_time_start',
                    'st.time_end as study_time_end',
                    'us.user_name as user_name',
                    'us.full_name as user_full_name'
                );
        return $classSubjects;
    }
}

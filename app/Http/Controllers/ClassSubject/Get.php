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

use DB;
class Get extends Controller
{
    // GET ALL CLASS SUBJECTS
    public function classSubjects(){
        $classSubjects = Get::dbClassSubject()->get();
        // return $classSubjects;
        return view(View::department('get-class-subjects'), [
            'classSubjects' => $classSubjects
        ]);
    }
    // GET DAYS CLASS SUBJECT
    public function classSubjectDetail($id){
        $classSubjects = Get::dbClassSubject()->where('cs.id', $id)->first();

        $daysClassSubject = DB::table('days_class_subject as dcs')
                            ->where('class_subject_id', $id)
                            ->join('users as us' , 'dcs.user_manager_uuid', '=', 'us.uuid')
                            ->select(
                                'dcs.id as id',
                                'us.user_name as user_name',
                                'us.full_name as user_full_name',
                                'dcs.date'
                            )
                            ->get();
        
        return view(View::department('get-detail-class-subject'), [
            'cLassSubject'=> $classSubjects,
            'daysClassSubject'=> $daysClassSubject
        ]);
    }

    // GET CLASS SUBJECT
    protected static function dbClassSubject(){
        $classSubjects = DB::table('class_subject as cs')
                ->join('class as c', 'cs.class_id' , '=', 'c.id')
                ->join('subjects as sj', 'cs.subject_id' , '=', 'sj.id')
                ->join('study_time as st', 'cs.study_time_id', '=', 'st.id')
                ->join('users as us', 'cs.user_manager_uuid', 'us.uuid')
                ->where('cs.soft_deleted', Core::false())
                ->select(
                    'cs.id',
                    'c.name as class_name',
                    'c.code as class_code',
                    'sj.name as subject_name',
                    'sj.code as subject_code',
                    'st.name as study_time_name',
                    'st.time_start as study_time_start',
                    'st.time_end as study_time_end',
                    'us.user_name as user_name',
                    'us.full_name as user_full_name'
                );
        return $classSubjects;
    }
}

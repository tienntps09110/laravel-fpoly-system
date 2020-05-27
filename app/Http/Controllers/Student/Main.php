<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Core\Core;
use App\Http\Controllers\Student\Core as CoreS;
use Carbon\Carbon;
use App\Model\ClassSubject;
use App\Model\classM;
use DB;

class Main extends Controller
{
    public function home(){
        $classM = ClassM::find(CoreS::user()->class_id);
        $classM->time_start = Carbon::parse($classM->time_start)->toDateString();
        $classM->time_end = Carbon::parse($classM->time_end)->toDateString();

        return view('student.home', [
            'Core'=> new CoreS,
            'classM'=> $classM
        ]);
    }
    public function classSubjectsView(){
        $classSubjects = Main::classSubjects();
        return view('student.get-class-subjects', [
            'classSubjects'=> $classSubjects
        ]);
    }
    
    // DETAIL CLASS SUBJECT DAYS
    public function classSubjectDetailView($classSubjectId){
        $data = Main::classSubjectDetail($classSubjectId);
        if($data == Core::false()){
            return Core::notFound();
        }
        // return json_encode($classSubject);
        return view('student.get-class-subject', [
            'cLassSubject'      => $data['classSubject'],
            'daysClassSubject'  => $data['daysClassSubject']
        ]);
    }
    // GET CLASS SUBJECTS ALL
    public function classSubjectAll(){
        $classSubjects = Main::classSubjects();
        $data = [];
        foreach($classSubjects as $classSub){
            $classDetail = Main::classSubjectDetail($classSub->id, 'date')['daysClassSubject'];
            foreach( $classDetail as $cD){
                $cD->day_name   = Core::dayString(Carbon::parse($cD->date)->dayOfWeek);
                $cD->class_name = $classSub->class_name;
                $cD->subject_name = $classSub->subject_name;
                $cD->study_time_name = $classSub->study_time_name;
                $cD->study_time_start = $classSub->study_time_start;
                $cD->study_time_end = $classSub->study_time_end;
                $data[] = $cD;
            }
        }
        $data = collect($data)->sortBy('date')->values()->all();
        return view('student.get-days-study',[
            'classSubjectDays'=> $data
        ]);
        
    }
    // GET CLASS SUBJECT DETAIL
    protected static function classSubjectDetail($classSubjectId, $method = 'default'){
        $classSubject = CoreS::dbClassSubject()
                        ->where('cs.id', $classSubjectId)
                        ->where('cs.class_id', CoreS::user()->class_id)
                        ->first();
        
        if(!$classSubject){
            return Core::false();
        }
        $daysClassSubject = DB::table('days_class_subject as dcs')
                            ->join('class_subject as cs', 'dcs.class_subject_id', '=', 'cs.id')
                            ->join('users as us' , 'dcs.user_manager_uuid', '=', 'us.uuid')
                            ->where('class_subject_id', $classSubjectId)
                            ->where('cs.class_id', CoreS::user()->class_id)
                            ->select(
                                'dcs.id as id',
                                'dcs.class_subject_id',
                                'us.user_name as user_name',
                                'us.full_name as user_full_name',
                                'dcs.date',
                                'dcs.checked'
                            );
        if($method != 'default'){
            $daysClassSubject->where('dcs.date', '>=', Carbon::now()->toDateString());
        }
        return $data = [
            'classSubject'      => $classSubject,
            'daysClassSubject'  => $daysClassSubject->get()
        ];
    }
    protected static function classSubjects(){
        $classSubjects = CoreS::dbClassSubject()
                            ->where('class_id', CoreS::user()->class_id)
                            ->where('datetime_end', '>', Carbon::now()->toDateString())
                            ->get();
        return $classSubjects;
    }
}

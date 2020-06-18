<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Core\Core;
use App\Http\Controllers\Student\Core as CoreS;
use Carbon\Carbon;
use App\Model\ClassSubject;
use App\Model\ClassM;
use DB;

class Main extends Controller
{
    public function home()
    {
        $classM             = ClassM::find(CoreS::user()->class_id);
        $classM->time_start = Carbon::parse($classM->time_start)->toDateString();
        $classM->time_end   = Carbon::parse($classM->time_end)->toDateString();

        return view('student.info-student', [
            'CoreS' => new CoreS,
            'classM' => $classM
        ]);
    }
    public function classSubjectsView()
    {
        $classSubjects = Main::classSubjects();
        return view('student.get-class-subjects', [
            'classSubjects' => $classSubjects,
            'CoreS'              => new CoreS
        ]);
    }

    // DETAIL CLASS SUBJECT DAYS
    public function classSubjectDetailView($classSubjectId)
    {
        $data = Main::classSubjectDetail($classSubjectId);
        if ($data == Core::false()) {
            return Core::notFound();
        }
        // return CoreS::user()->id;
        $countdayStudy = DB::table('attendance as ad')
                            ->join('days_class_subject as dcs', 'ad.days_class_subject_id', 'dcs.id')
                            ->join('class_subject as cs', 'dcs.class_subject_id', '=', 'cs.id')
                            ->where('ad.student_id', CoreS::user()->id)
                            ->where('ad.checked', Core::false())
                            ->where('cs.subject_id', $data['classSubject']->subject_id)
                            ->where('cs.class_id', $data['classSubject']->class_id)
                            ->count();
                            
        // return json_encode($classSubject);
        return view('student.get-class-subject', [
            'classSubject'      => $data['classSubject'],
            'daysClassSubject'  => $data['daysClassSubject'],
            'countdayStudy'     => $countdayStudy,
            'CoreS'              => new CoreS,
            'Core'              => new Core,
            'Carbon'            => new Carbon
        ]);
    }
    // GET CLASS SUBJECTS ALL
    public function classSubjectAll()
    {
        $classSubjects = Main::classSubjects();
        $todayCheck = Carbon::now()->toDateString();
        $data = [];
        foreach ($classSubjects as $classSub) {
            $classDetail = Main::classSubjectDetail($classSub->id, 'date')['daysClassSubject'];
            foreach ($classDetail as $cD) {
                $cD->day_name   = Core::dayString(Carbon::parse($cD->date)->dayOfWeek);
                $cD->day_checked   = $todayCheck == Carbon::parse($cD->date)->toDateString() ? 'true': 'false';
                $cD->class_name = $classSub->class_name;
                $cD->subject_name = $classSub->subject_name;
                $cD->study_time_name = $classSub->study_time_name;
                $cD->study_time_start = $classSub->study_time_start;
                $cD->study_time_end = $classSub->study_time_end;
                $data[] = $cD;
            }
        }
        $data = collect($data)->sortBy('date')->values()->all();
        return view('student.get-days-study', [
            'classSubjectDays' => $data,
            'CoreS'              => new CoreS
        ]);
    }
    // GET CLASS SUBJECT DETAIL
    protected static function classSubjectDetail($classSubjectId, $method = 'default')
    {
        $classSubject = CoreS::dbClassSubject()
            ->where('cs.id', $classSubjectId)
            ->where('cs.class_id', CoreS::user()->class_id)
            ->first();

        if (!$classSubject) {
            return Core::false();
        }
        $daysClassSubject = DB::table('days_class_subject as dcs')
            ->join('class_subject as cs', 'dcs.class_subject_id', '=', 'cs.id')
            ->join('users as us', 'dcs.user_manager_uuid', '=', 'us.uuid')
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
        if ($method != 'default') {
            $daysClassSubject->where('dcs.date', '>=', Carbon::now()->toDateString());
        }
        return $data = [
            'classSubject'      => $classSubject,
            'daysClassSubject'  => $daysClassSubject->get(),
            'CoreS'              => new CoreS
        ];
    }
    protected static function classSubjects()
    {
        $classSubjects = CoreS::dbClassSubject()
            ->where('class_id', CoreS::user()->class_id)
            ->where('datetime_end', '>', Carbon::now()->toDateString())
            ->get();
        return $classSubjects;
    }
}

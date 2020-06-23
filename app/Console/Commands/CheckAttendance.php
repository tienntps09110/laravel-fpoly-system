<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\Core\Core;
use Carbon\Carbon;
use App\User;
use App\Model\DaysClassSubject;
use App\Model\StudyTime;
use App\Model\Students;
use App\Model\Attendance;
use DB;

class CheckAttendance extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check:attendance';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check attendance and students attendance';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $timeNow = Carbon::now();

        $daysClassSubject = DB::table('days_class_subject as dcs')
            ->join('class_subject as cs', 'dcs.class_subject_id', '=', 'cs.id')
            ->join('study_time as st', 'cs.study_time_id', '=', 'st.id')
            ->whereDate('dcs.date', Carbon::now())
            ->where('dcs.checked', Core::false())
            ->select(
                'dcs.id as dcs_id', 'date as dcs_date', 'dcs.checked as dcs_checked',
                'st.id as st_id', 'st.time_start as st_time_start', 'st.time_end as st_time_end',
                'cs.class_id as cs_class_id'
            )
            ->get();

        $arrayExTime = [];
        foreach($daysClassSubject as $detail){
            if(Carbon::parse($detail->dcs_date .' ' .$detail->st_time_end) < $timeNow
            ){
                $arrayExTime[] = $detail;
            }
        }
        // print_r($arrayExTime);
        return $this->attendance($arrayExTime);
    }
    // Check day and insert
    private function attendance(Array $daysClassSubject = []){
        foreach($daysClassSubject as $detail){
            $students = $this->students($detail->cs_class_id);
            foreach($students as $student){
                $insert = new Attendance;
                $insert->student_id             = $student->id;
                $insert->days_class_subject_id  = $detail->dcs_id;
                $insert->checked                = Core::true();
                $insert->save();
            }
            $updateDay = DaysClassSubject::find($detail->dcs_id);
            $updateDay->checked = Core::true();
            $updateDay->save();
        }
        print_r('CHECK ATTENDANCE SUCCESSFULLY');
    }
    // Get students
    private function students(String $classId = ''){
        return Students::where('class_id', $classId)
                ->where('soft_deleted', Core::false())
                ->select('id')
                ->get();
    }
}

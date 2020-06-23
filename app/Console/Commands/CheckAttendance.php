<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\Core\Core;
use Carbon\Carbon;
use App\User;
use App\Model\DaysClassSubject;

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
        $daysClassSubject = DB::table('days_class_subject as dcs')
                                ->join('class_subject as cs', 'dcs.class_subject_id', '=', 'cs.id')
                                
                                ->whereDate('date', Carbon::now())
                                ->where('checked', Core::false())
                                ->get();
        foreach($daysClassSubject as $detail){
            
        }
        
    }
}

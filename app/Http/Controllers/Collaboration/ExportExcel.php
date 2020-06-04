<?php

namespace App\Http\Controllers\Collaboration;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Exports\Teacher\Teachers;
use App\Exports\Student\Students;
use App\Exports\ClassEx\ClassE;
use Maatwebsite\Excel\Facades\Excel;

use Carbon\Carbon;

class ExportExcel extends Controller
{
    // EXPORT TEACHERS
    public function exportTeacher(){
        $now = Carbon::now();
        $nameFile = $this->nameExcelTeacher .str_replace(':', '_', $now->toTimeString()) .'_' .str_replace('-', '_', $now->toDateString());
        return Excel::download(new Teachers, $nameFile.'.xlsx');    
    }
    
    // EXPORT STUDENTS
    public function exportStudent(){
        $now = Carbon::now();
        $nameFile = $this->nameExcelStudent .str_replace(':', '_', $now->toTimeString()) .'_' .str_replace('-', '_', $now->toDateString());
        return Excel::download(new Students, $nameFile.'.xlsx');    
    }

    // EXPORT CLASS
    public function exportClass(){
        $now = Carbon::now();
        $nameFile = $this->nameExcelClass .str_replace(':', '_', $now->toTimeString()) .'_' .str_replace('-', '_', $now->toDateString());
        return Excel::download(new ClassE, $nameFile.'.xlsx');
    }
}

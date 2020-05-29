<?php

namespace App\Http\Controllers\Collaboration;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Core\Json;
use App\Http\Controllers\Core\Core;
use App\Http\Controllers\Core\View;
use Carbon\Carbon;
use App\User;
use Auth;
use App\Model\Attendance;
class Get extends Controller
{
    public function home(){
        return view(View::collaboration('home'));
    }
    // COUNT USERS
    public function countUsers(){
        $teacher;
        $student;
        $classM;
        return Get::countMonth();
        $data = [
            'teacher'=>$teacher,
            'student'=>$student,
            'classM' =>$classM
        ];
        return $data;
    }
    // 1 THÁNG GẦN NHẤT SỐ LIỆU FAIL ĐIỂM DANH
    protected static function countMonth(){
        // 
        $daysDefault = 28;
        $daysSub = 7;
        
        // 
        $labels = [];
        $data   = [];

        for($i = 0; $i <= 3; $i++){    
            $time = [ 
                'dateStart'=> Carbon::now()->subDays($daysDefault)->toDateString() . ' 00:00:00',
                'dateEnd'=> Carbon::now()->subDays($daysDefault - $daysSub)->toDateString() . ' 23:59:59'
            ];
            $daysDefault -= 7;
            $count = Get::getCountStudentFail($time);
            
            $labels[] = Carbon::parse($time['dateStart'])->format('d/m') .'-' .Carbon::parse($time['dateStart'])->format('d/m');
            $data[] = $count;
        }
        return (object) [
            'labels'=>$labels,
            'data'  => $data
        ];

    //    echo $lastMonth;
        $data = [11, 43, 54, 43];
    }
    // TỔNG SỐ FAILL CỦA TẤT CẢ LỚP
    protected static function countClass(){
        $labels = [];
        $data = [];
    }
    protected static function getCountStudentFail($data){
        $attendance = Attendance::where('created_at', '>=', $data['dateStart'])
                                ->where('created_at', '<=', $data['dateEnd'])
                                ->orderByDesc('id')
                                ->where('checked', Core::false())
                                ->count();
        return $attendance;
    }
}

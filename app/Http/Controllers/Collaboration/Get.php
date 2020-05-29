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
        $lastMonth = Carbon::now()->subDays(28);
        $day = 7;
        $labels = [];
        // echo $lastMonth->toDateString();
        $data = [ 
            'dateStart'=> Carbon::now()->subDays(7)->toDateString() . ' 00:00:00',
            'dateEnd'=> Carbon::now()->subDays(3)->toDateString() . ' 23:00:00'
        ];
        return Get::getCountStudentFail($data);
        for($i = 0; $i <= 3; $i++){    
            echo '<br>'.$lastMonth->toDateString(). ' - ' .$lastMonth->addDays(7)->toDateString();
        }
    //    echo $lastMonth;
        $data = [11, 43, 54, 43];
    }
    // TỔNG SỐ FAILL CỦA TẤT CẢ LỚP
    protected static function countClass(){
        $labels = ['25-29', '29-30', '30-33', '33-39'];
        $data = [11, 43, 54, 43];
    }
    protected static function getCountStudentFail($data){
        $attendance = Attendance::where('created_at', '>=', $data['dateStart'])
                                ->where('created_at', '<=', $data['dateEnd'])
                                ->orderByDesc('id')
                                ->where('checked', Core::false())
                                ->get();
        return $attendance;
    }
}

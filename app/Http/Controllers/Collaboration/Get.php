<?php

namespace App\Http\Controllers\Collaboration;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Core\Json;
use App\Http\Controllers\Core\Core;
use App\Http\Controllers\Core\View;
use Auth;
use Carbon\Carbon;
use App\User;
use App\Model\Attendance;
use App\Model\Subjects;
use DB;

class Get extends Controller
{
    public function home()
    {
        return view('collaboration.full-dashboard', [
            'countMonth' => json_encode(Get::countMonth()),
            'countClass' => json_encode(Get::countClass()),
            'noteTeacher' => Get::noteTeacher()
        ]);
    }

    // 1 THÁNG GẦN NHẤT SỐ LIỆU NGHỈ HỌC
    protected static function countMonth()
    {
        // 
        $daysDefault = 28;
        $daysSub = 7;

        // 
        $labels = [];
        $data   = [];

        for ($i = 0; $i <= 3; $i++) {
            $time = [
                'dateStart' => Carbon::now()->subDays($daysDefault)->toDateString() . ' 00:00:00',
                'dateEnd' => Carbon::now()->subDays($daysDefault - $daysSub)->toDateString() . ' 23:59:59'
            ];
            $daysDefault -= 7;
            $count = Get::getCountStudentFail($time);

            $labels[] = Carbon::parse($time['dateStart'])->format('d/m') . '-' . Carbon::parse($time['dateEnd'])->format('d/m');
            $data[] = $count;
        }
        return [
            'labels' => $labels,
            'data'  => $data
        ];
    }
    // TỔNG SỐ FAIL ĐIỂM DANH CỦA TẤT CẢ LỚP
    protected static function countClass()
    {
        $labels = [];
        $data = [];
        $subjects = Subjects::where('soft_deleted', Core::false())->get();
        foreach ($subjects as $subject) {
            $count = Get::getFailAttendance($subject->id);
            $labels[] = $subject->name;
            $data[]   = $count;
        }
        return [
            'labels' => $labels,
            'data'  => $data
        ];
    }

    // GET NOTE TEACHER TAKE 15
    public static function noteTeacher()
    {
        return DB::table('days_class_subject as dcs')
            ->join('class_subject as cs', 'dcs.class_subject_id', '=', 'cs.id')
            ->join('class as c', 'cs.class_id', '=', 'c.id')
            ->join('subjects as s', 'cs.subject_id', '=', 's.id')
            ->join('users as teacher', 'cs.user_manager_uuid', 'teacher.uuid')
            ->whereNotNull('dcs.note')
            ->select(
                'teacher.full_name as teacher_full_name',
                'c.name as class_name',
                's.name as subject_name',
                'dcs.note'
            )
            ->take(15)
            ->get();
    }

    // COUNT IN DB
    protected static function getFailAttendance($subjectId)
    {
        return DB::table('attendance as ad')
            ->join('days_class_subject as dcs', 'ad.days_class_subject_id', 'dcs.id')
            ->join('class_subject as cs', 'dcs.class_subject_id', '=', 'cs.id')
            ->where('ad.checked', Core::false())
            ->where('cs.subject_id', $subjectId)
            ->count();
    }
    protected static function getCountStudentFail($data)
    {
        return Attendance::where('created_at', '>=', $data['dateStart'])
            ->where('created_at', '<=', $data['dateEnd'])
            ->orderByDesc('id')
            ->where('checked', Core::false())
            ->count();
    }
}

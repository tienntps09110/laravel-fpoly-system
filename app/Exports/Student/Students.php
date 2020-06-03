<?php

namespace App\Exports\Student;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use App\Http\Controllers\Core\Core;

use App\Model\Students as StudentsM;

class Students implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $students = StudentsM::join('class as c', 'students.class_id', '=', 'c.id')
                        ->where('students.soft_deleted', Core::false())
                        ->select(
                            'student_code',
                            'full_name',
                            'phone_number',
                            'email',
                            'c.name'
                        )
                        ->orderBy('c.id')
                        ->orderBy('students.id')
                        ->get();

        return $students;
    }
    public function headings(): array
    {
        return [
            'MSSV',
            'Tên',
            'Số điện thoại',
            'Email',
            'Lớp'
        ];
    }
}

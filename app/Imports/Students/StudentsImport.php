<?php

namespace App\Imports\Students;

use App\Model\Students;
use Maatwebsite\Excel\Concerns\ToModel;

class StudentsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Students([
            'student_code'=> $row[0],
            'full_name'   => $row[1],
            'phone_number'=> $row[2],
            'email'       => $row[3],
            'class_code'  => $row[4]
        ]);
    }
}

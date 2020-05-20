<?php

namespace App\Imports\Users;

use App\user;
use Maatwebsite\Excel\Concerns\ToModel;

class TeacherImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new user([
            'user_name'     => $row[0],
            'password'      => $row[1],
            'full_name'     => $row[2],
            'email'         => $row[3],
            'phone_number'  => $row[4]
        ]);
    }
}

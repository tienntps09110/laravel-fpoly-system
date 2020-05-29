<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $table = 'attendance';

    protected $fillable = [
        'id',
        'student_id',
        'days_class_subject_id',
        'checked',
        'created_at',
        'updated_at'
    ];
    protected $hidden = [
    ];
}

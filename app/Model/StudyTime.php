<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class StudyTime extends Model
{
    protected $table = 'study_time';
    protected $fillable = [
        'id',
        'name',
        'code',
        'time_start',
        'time_end'
    ];
    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}

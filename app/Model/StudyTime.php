<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class StudyTime extends Model
{
    protected $table = 'study_time';
    protected $fillable = [
        'id',
    ];
    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}

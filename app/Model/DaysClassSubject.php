<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class DaysClassSubject extends Model
{
    protected $table = 'days_class_subject';
    
    protected $fillable = [
        'id',
        'class_subject_id',
        'user_manager_uuid',
        'date'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}

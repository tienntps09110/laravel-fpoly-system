<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class DaysClassSubject extends Model
{
    protected $table = 'days_class_subject';
    protected $fillable = [
        'id',
    ];
    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}

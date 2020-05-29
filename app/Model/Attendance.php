<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $table = 'attendance';
    protected $fillable = [
        'id',
        'created_at',
        'updated_at'
    ];
    protected $hidden = [
    ];
}

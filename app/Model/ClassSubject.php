<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ClassSubject extends Model
{
    protected $table = 'class_subject';
    protected $fillable = [
        'id',
    ];
    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}

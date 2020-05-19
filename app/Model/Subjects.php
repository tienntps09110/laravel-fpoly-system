<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Subjects extends Model
{
    protected $table = 'subjects';
    protected $fillable = [
        'id',
    ];
    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}

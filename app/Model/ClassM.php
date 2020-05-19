<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ClassM extends Model
{
    protected $table = 'class';
    protected $fillable = [
        'id',
    ];
    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}

<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Uuid;

class User extends Authenticatable
{
    use Notifiable;

    protected $primaryKey = 'uuid';
    protected $keyType = 'string';
    
    protected $fillable = [
        'user_name',
        'user_parent_uuid',
        'password',
        'full_name',
        'email',
        'phone_number',
        'avatar_img_path',
        'remember_token',
        'soft_deleted'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    // protected $casts = [
    //     'user_parent_uuid' => 'string'
    // ];

    public static function boot(){
        parent::boot();
        self::creating(function ($model) {
            $model->uuid = (string) Uuid::generate(4);
        });
    }
}

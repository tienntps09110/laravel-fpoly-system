<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Core\Json;

class Get extends Controller
{
    public function getAll(){
        $users = [
            'data'=> [
                [
                'id'=> 1,
                'name'=> 'hello'
                ],
                [
                'id'=> 1,
                'name'=> 'hello'
                ]
            ],
            'key'=> 'Users'
        ];
        $product = [
            'data'=> [
                [
                'id'=> 1,
                'name'=> 'as'
                ],
                [
                'id'=> 1,
                'name'=> 'gdsfs'
                ]
            ],
            'key'=> 'Products'
        ];
        $data = [$users, $product];
        $status = 200;
        $message = 'Users';
        return Json::get($data, $status, $message);
    }
}

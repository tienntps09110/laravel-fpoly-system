<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Core\Core;
use App\User;
// use App\Model\User;
// use App\Model\User;

class Update extends Controller
{
    public function userView($uuid){
        $user = User::where('uuid', $uuid)
                    ->where('soft_deleted', Core::false())
                    ->firstOrFail();
        
        return view('department.update-user', [
            'user'=>$user
        ]);
    }
    public function user(Request $req){
        $req->validate([
            'uuid'          => 'required | min:1 | max:255',
            'full_name'     => 'required | min:1 | max:255',
            'sex'           => 'required | min:1 | max:255',
            'phone_number'  => 'min:1 | max:255',
            'email'         => 'min:1 | max:255',
            'address'       => 'min:1 | max:255'
        ]);
        $userCheck = User::where('uuid', $req->uuid)
                        ->where('soft_deleted', Core::false())
                        ->first();
        if(!$userCheck){
            return Core::toBack($this->danger, 'Không tìm thấy tài khoản cần cập nhật');
        }
        $userCheck->full_name = $req->full_name;
        $userCheck->sex = $req->sex;
        $userCheck->phone_number = $req->phone_number;
        $userCheck->email = $req->email;
        $userCheck->address = $req->address;
        $userCheck->save();
        return Core::toBack($this->success, 'Cập nhật tài khoản thành công');
    }
}

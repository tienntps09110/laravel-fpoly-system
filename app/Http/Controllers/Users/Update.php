<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\Core\Core;
use App\User;

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
            'uuid'              => 'required | min:1 | max:255',
            'full_name'         => 'required | min:1 | max:255',
            'sex'               => 'required | min:1 | max:255',
            'phone_number'      => 'min:1 | max:255',
            'email'             => 'min:1 | max:255',
            'address'           => 'min:1 | max:255',
            'avatar_img_path'   => 'min:1 | max:30000'
        ]);
        $userCheck = User::where('uuid', $req->uuid)
                        ->where('soft_deleted', Core::false())
                        ->first();
        if(!$userCheck){
            return Core::toBack($this->danger, 'Không tìm thấy tài khoản cần cập nhật');
        }
        $avatar_img_path = $userCheck->avatar_img_path;

        if($req->avatar_img_path){
            // return $req->avatar_img_path;
            $tmpName = $_FILES["avatar_img_path"]["tmp_name"];
            $typeImage = Str::afterLast($_FILES["avatar_img_path"]['type'], '/');
            $name = '/images/users/'.$userCheck->user_name .Str::random(15) .'.' .$typeImage;
            $avatar_img_path = $name;
            move_uploaded_file($tmpName, public_path() .$name);
        }
        $userCheck->full_name = $req->full_name;
        $userCheck->sex = $req->sex;
        $userCheck->phone_number = $req->phone_number;
        $userCheck->email = $req->email;
        $userCheck->address = $req->address;
        $userCheck->avatar_img_path = $avatar_img_path;
        $userCheck->save();
        return Core::toBack($this->success, 'Cập nhật tài khoản thành công');
    }
}

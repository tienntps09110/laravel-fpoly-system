<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Core\Json;
use App\Http\Controllers\Core\Core;
use App\Http\Controllers\Core\View;
use Auth;
use App\User;
use App\Model\Role;
use App\Model\UserRole;

class Create extends Controller
{
    public function createUserView(){
        $roles = Role::whereNotIn('code', ['admin'])->get();

        return view(View::admin('create-user'),[
            'roles'=>$roles
        ]);
    }
    public function createUserPost(Request $req){
        $req->validate([
            'user_name'         => 'required | min:1 | max:255',
            'password'          => 'required | min:1 | max:255',
            'full_name'         => 'required | min:1 | max:255',
            'phone_number'      => 'required | min:1 | max:255',
            'email'             => 'required | min:1 | max:255',
            'avatar_img_path'   => 'required | min:1 | max:255',
            'role'              => 'required | min:1 | max:255'
        ]);

        $userNameCheck = User::where('user_name', $req->user_name)->first();

        if($userNameCheck){
            return Core::toBack($this->danger, 'Tên tài khoản đã tồn tại');
        }
        
        $data = (object) [
            'user_name'=> $req->user_name,
            'user_parent_uuid'=> Core::parent(),
            'password'=>$req->password,
            'full_name'=>$req->full_name,
            'phone_number'=>$req->phone_number,
            'email'=>$req->email,
            'avatar_img_path'=> $req->avatar_img_path,
            'soft_deleted'=> Core::false()
        ];
        $user = $this->create($data);
        $user = User::where('user_name', $user->user_name)->first();
        
        // for($i = 1; $i <= $req->role; $i++){
        $userRole = new UserRole;
        $userRole->user_uuid = $user->uuid;
        $userRole->role_id = $req->role;
        $userRole->save();
        // }
        return Core::toBack($this->success, "Tạo tài khoản thành công");
    }
    
    // CREATE USER
    protected function create($data){
        $user = new User;
        $user->user_name = $data->user_name;
        $user->user_parent_uuid = $data->user_parent_uuid;
        $user->password = Hash::make($data->password);
        $user->full_name = $data->full_name;
        $user->phone_number = $data->phone_number;
        $user->email = $data->email;
        $user->avatar_img_path = $data->avatar_img_path;
        $user->soft_deleted = $data->soft_deleted;
        $user->save();
        return $user;
    }
}

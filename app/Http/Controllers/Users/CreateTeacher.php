<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Core\Json;
use App\Http\Controllers\Core\Core;
use App\Http\Controllers\Core\View;
use App\Http\Controllers\Users\CoreUsers;
use App\Imports\Users\TeacherImport;
use Maatwebsite\Excel\Facades\Excel;

use Auth;
use App\User;
use App\Model\Role;
use App\Model\UserRole;
use Validator;
class CreateTeacher extends Controller
{
    public function teachersView(){
        return view(View::department('create-teacher'));
    }
    public function teachersPost(Request $req){
        $validator = Validator::make($req->all(), [
            'excel'=>'required | min:1 | max:255'
        ]);
        if ($validator->fails()) {
            return Json::getMess($validator->errors(), 422);
        }
        $arrayError = [];
        $arrayTeachers = Excel::toArray(new TeacherImport, $req->excel)[0];

        for($i = 1; $i <= count($arrayTeachers) - 1; $i++){
            $data = (object) [
                'user_name'         => $arrayTeachers[$i][0],
                'password'          => $arrayTeachers[$i][1],
                'full_name'         => $arrayTeachers[$i][2],
                'email'             => $arrayTeachers[$i][3],
                'phone_number'      => $arrayTeachers[$i][4],
                'avatar_img_path'   => 'images/users/user.png',
                'soft_deleted'      => Core::false(),
                'user_parent_uuid'=> Core::parent()
            ];
            $userNameCheck = User::where('user_name', $data->user_name)->first();
            if($userNameCheck){
                $arrayError[$data->user_name] = "$data->user_name: Tên tài khoản đã tồn tại";
                continue;
            }
            $user = CoreUsers::create($data);
            $user = User::where('user_name', $user->user_name)->first();
            $userRole = new UserRole;
            $userRole->user_uuid = $user->uuid;
            $userRole->role_id = 1;
            $userRole->save();
        }
        if(count($arrayError) != 0){
            // return redirect()->back()->withErrors($arrayError);
            return Json::getMess($arrayError, 422);

        }
        // return Core::toBack($this->success, 'Tạo tất cả giảng viên từ file xlsx thành công');
        return Json::getMess('Tạo tất cả giảng viên từ file xlsx thành công', 200);
        
    }
}
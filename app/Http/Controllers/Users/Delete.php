<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Delete extends Controller
{
    public function delete(Request $req){
        $this->validate($req, [
            'uuid'=> 'require | min:1 | max: 255'
        ]);
        $userCheck = User::find($req->uuid)->first();
        if($userCheck){
            return Core::toBack($this->danger, 'Tài khoản không tồn tại');
        }

        $userCheck->soft_deleted = Core::true();
        $userCheck->save();
        
        return Core::toBack($this->success, 'Xóa tài khoản thành công');
    }
}

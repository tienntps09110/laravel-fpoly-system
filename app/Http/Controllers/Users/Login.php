<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Core\Core;
use App\Http\Controllers\Core\Json;
use App\Http\Controllers\Core\View;
use Illuminate\Support\Facades\Auth;
use App\User;

class Login extends Controller
{
    // VIEW LOGIN
    public function getView(){
        if(Auth::check()){
            $redirectRole = Core::homeRole();
            return redirect()->route($redirectRole);
        }
        return view(View::auth($this->viewLogin));
    }
    // METHOD POST LOGIN
    public function login(Request $req){
        $req->validate([
            '_token'   => 'required | min:1 | max:255',
            'user_name'=> 'required | min:1 | max:255',
            'password' => 'required | min:1 | max:255'
        ]);
        
        $data = [
            'user_name'=> $req->user_name,
            'password'=> $req->password,
            'soft_deleted'=> Core::false()
        ];
        if(Auth::attempt($data)){
            $redirectRole = Core::homeRole();
            return redirect()->route($redirectRole);
        }
        return Core::toBack($this->danger, 'Sai tài khoản hoặc mật khẩu');
    }
    public function logout(){
        if(Auth::check()){
            Auth::logout();
        }
        return redirect()->route($this->routeLogin);
    }
}
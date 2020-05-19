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
        // dd(Auth::check());
        if(Auth::check()){

            return redirect()->route($this->routeUsers);
        }
        return view(View::auth($this->viewLogin));
    }
    // METHOD POST LOGIN
    public function login(Request $req){
        $data = [
            'user_name'=> $req->user_name,
            'password'=> $req->password,
            'soft_deleted'=> Core::false()
        ];
        if(Auth::attempt($data)){
            return redirect()->route($this->routeUsers);
        }
        return redirect()->back()->with($this->danger,'Sai tài khoản hoặc mật khẩu');
    }
    public function logout(){
        if(Auth::check()){
            Auth::logout();
        }
        return redirect()->route($this->routeLogin);
    }
}

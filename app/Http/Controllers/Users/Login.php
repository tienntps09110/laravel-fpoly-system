<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Http\Responsecookie;
use App\Http\Controllers\Core\Core;
use App\Http\Controllers\Core\Json;
use App\Http\Controllers\Core\View;
use App\User;

class Login extends Controller
{
    // VIEW LOGIN
    public function getView(Request $req){
        if(Auth::check()){
            $redirectRole = Core::homeRole();
            return redirect()->route($redirectRole);
        }

        $cookieUserName = $req->cookie('user_name')?$req->cookie('user_name'):null;
        $cookiePassword = $req->cookie('password')?$req->cookie('password'):null;

        return view(View::auth($this->viewLogin), [
            'cookieUserName'=> $cookieUserName,
            'cookiePassword'=> $cookiePassword
        ]);
    }

    // METHOD POST LOGIN
    public function login(Request $req){
        $req->validate([
            '_token'   => 'required | min:1 | max:255',
            'user_name'=> 'required | min:1 | max:255',
            'password' => 'required | min:1 | max:255',
            'remember' => '           min:1 | max:255'
        ]);
        
        $data = [
            'user_name'=> $req->user_name,
            'password'=> $req->password,
            'soft_deleted'=> Core::false()
        ];
        if(!Auth::attempt($data)){
            return Core::toBack($this->danger, 'Sai tài khoản hoặc mật khẩu');
        }
        $redirectRole = Core::homeRole();

        if($req->remember){
            return redirect()
                ->route($redirectRole)
                ->cookie(
                    'user_name', $req->user_name, 999*99
                )
                ->cookie(
                    'password', $req->password, 999*99
                );
        }

        return redirect()->route($redirectRole)
                ->cookie(
                    'user_name', '', 0
                )->cookie(
                    'password', '', 0
                );
    }
    public function logout(){
        if(Auth::check()){
            Auth::logout();
        }
        return redirect()->route($this->routeLogin);
    }
}
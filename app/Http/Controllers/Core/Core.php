<?php

namespace App\Http\Controllers\Core;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Core\View;
use App\Model\UserRole;
use App\Model\Role;
use Auth;
class Core extends Controller
{
    public static function parent(){
        return Auth::user()->user_parent_uuid;
    }
    public static function true(){
        return 'true';
    }
    public static function false(){
        return 'false';
    }
    public static function notFound(){
        return view(View::errors('404'));
    }
    public static function role($user){
        $user_role = UserRole::where('user_uuid', $user->uuid)->max('role_id');
        $role = Role::find($user_role);
        return $role;
    }
    public static function toBack($key = 'Danger', $text = ''){
        return redirect()->back()->with($key, $text);
    }
    public static function homeRole(){
        $roleUser = Core::role(Auth::user())->code;
        $redirectRole = '';
        switch($roleUser){
            case 'admin':
                $redirectRole = 'admin-home';
                break;
            case 'teacher':
                $redirectRole = 'teacher-home';
                break;
            case 'collaboration':
                $redirectRole = 'collaboration-home';
                break;
            case 'department':
                $redirectRole = 'department-home';
                break;
        }
        return $redirectRole;
    }
    public static function dayString($code){
        
        switch($code){
            case 0:
                return 'Chủ nhật';
            break;
            case 1:
                return 'thứ hai';
            break;
            case 2:
                return 'thứ ba';
            break;
            case 3:
                return 'thứ tư';
            break;
            case 4:
                return 'thứ năm';
            break;
            case 5:
                return 'thứ sáu';
            break;
            case 6:
                return 'thứ bảy';
            break;
            default:
                return 'không xác định';
        }
    }
    public static function token($length){
        $token = "";
        $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $codeAlphabet.= "abcdefghijklmnopqrstuvwxyz";
        $codeAlphabet.= "0123456789";
        $max = strlen($codeAlphabet);
    
        for ($i=0; $i < $length; $i++) {
            $token .= $codeAlphabet[random_int(0, $max-1)];
        }
    
        return $token;
    }
}
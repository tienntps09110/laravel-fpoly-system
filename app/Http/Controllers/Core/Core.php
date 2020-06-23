<?php

namespace App\Http\Controllers\Core;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Events\Dashboard\DashboardHome;
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

    // GET TOKEN
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

    // REAL TIME
    public static function pushRealTime($route, $channel = 'dashboard-home'){
        $data = (object)[
            'channel'=> $channel,
            'route_name'=> route($route)
        ];
        event(new DashboardHome($data));
    }
    // VN->EN
    public static function vnToEn($str){
        $unicode = array(
            'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',
            'd'=>'đ',
            'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
            'i'=>'í|ì|ỉ|ĩ|ị',
            'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
            'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
            'y'=>'ý|ỳ|ỷ|ỹ|ỵ',
            'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
            'D'=>'Đ',
            'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ', 
            'I'=>'Í|Ì|Ỉ|Ĩ|Ị',     
            'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',        
            'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',        
            'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ',       
        );        
        foreach($unicode as $nonUnicode=>$uni){        
            $str = preg_replace("/($uni)/i", $nonUnicode, $str);        
        }
        $str = str_replace(' ','_',$str);        
        return $str;
    }
}
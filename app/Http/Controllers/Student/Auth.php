<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Core\Json;
use App\Http\Controllers\Core\Core;
use App\Http\Controllers\Core\View;
use App\Http\Controllers\Students\CoreStudents;
use App\Imports\Students\StudentsImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Str;
use App\User;
use App\Model\Students;
use App\Model\ClassM;

class Auth extends Controller
{
    public function loginView(){
        if(session()->has('student_code') && session()->has('token')){
            return redirect()->route('student-home');    
        }
        return view('student.login');
    }
    public function logout(Request $req){
        $req->session()->forget('student_code');
        $req->session()->forget('token');
        return redirect()->route('student-login-view');
    }
    public function loginPost(Request $req){
        $req->validate([
            'student_code'=> 'required | min:1 | max:255',
            'password'    => 'required | min:1 | max:255'
        ]);
        
        $studentCheck = Students::where('student_code', $req->student_code)
                                ->where('soft_deleted', Core::false())
                                ->first();
        if(!$studentCheck){
            return Core::toBacK($this->danger, 'Sai mã số sinh viên hoặc mật khẩu');
        }
        if(!Hash::check($req->password, $studentCheck->password)){
            return Core::toBacK($this->danger, 'Sai mã số sinh viên hoặc mật khẩu');
        }
        $token = Core::token(60);
        $info = session([
                    'student_code' => $req->student_code,
                    'token'        => $token
                ]);
        $studentCheck->token = $token;
        $studentCheck->save();
        return redirect()->route('student-home');

    }
}

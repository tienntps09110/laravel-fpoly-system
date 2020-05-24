<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Core\View;

class Update extends Controller
{
    public function userView(){
        return view(View::admin('update-user'));
    }
    public function user(){
        return "POST UPDATE USER";
    }
}

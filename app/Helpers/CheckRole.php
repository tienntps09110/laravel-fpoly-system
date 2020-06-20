<?php
use App\Http\Controllers\Controller;
use App\Http\Controllers\Core\Core;

class CheckRole extends Controller
{
    public static function role(){
        return Core::role(Auth::user());
    }    
}
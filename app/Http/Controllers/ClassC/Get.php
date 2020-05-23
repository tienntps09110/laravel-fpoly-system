<?php

namespace App\Http\Controllers\ClassC;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Core\Core;
use App\Http\Controllers\Core\View;
use Illuminate\Support\Str;
use Auth;
use App\Model\Students;
use App\User;
use App\Model\ClassM;

class Get extends Controller
{
    public function classAll(){
        $classMs = ClassM::all();
        return view(View::department('get-class'), ['classMs'=>$classMs]); 
    }
    public function classDetail($id){
        $classMs = ClassM::where('id', $id)
                        ->where('soft_deleted', Core::false())
                        ->first();
        if(!$classMs){
            return Core::notFound();
        }
        return view(View::department('get-class-detail'), ['class'=>$classMs]);
    }
}

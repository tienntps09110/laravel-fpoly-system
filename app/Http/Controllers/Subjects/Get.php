<?php

namespace App\Http\Controllers\Subjects;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Core\Core;
use App\Http\Controllers\Core\View;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Auth;
use App\User;
use App\Model\Subjects;

class Get extends Controller
{
    public function subjects(){
        $subjects = Subjects::where('soft_deleted', Core::false())->get();
        return view(View::department('get-subjects'), ['subjects'=>$subjects]);
    }
    public function subject($id){
        $subject = Subjects::findOrFail($id)->first();
        return view(View::department('get-subject'), ['subject'=>$subject]);
    }
}

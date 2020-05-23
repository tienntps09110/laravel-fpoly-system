<?php

namespace App\Http\Controllers\ClassSubject;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Create extends Controller
{
    public function classSubject(){
        return view(View::department('create-class-subject'));
    }
    public function classSubjectPost(Request $req){
        $req->validate([
            // '' => 
        ]);
    }
}

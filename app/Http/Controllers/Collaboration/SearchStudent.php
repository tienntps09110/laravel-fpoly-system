<?php

namespace App\Http\Controllers\Collaboration;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SearchStudent extends Controller
{
    public function getSearch(){
        return view('collaboration.search-student');
    }
}

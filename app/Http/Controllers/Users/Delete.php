<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Delete extends Controller
{
    public function delete(Request $req){
        $this->validate($req, [
            'uuid'=> 'require | min:1 | max: 255'
        ]);
        
    }
}

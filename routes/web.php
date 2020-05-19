<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('hehe', function(){
//     $u = new App\User;
//     $u->user_name = 'admin';
//     $u->password = Hash::make('1');
//     $u->save();
//     return App\User::all();
// }); 
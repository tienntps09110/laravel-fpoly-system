<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function(){
    return redirect()->route('login');
});

Route::get('routes', 'Route\Get@home');

// Route::get('create-admin', function(){
//     $u = new App\User;
//     $u->user_name = 'admin';
//     $u->password = Hash::make('1');
//     $u->save();
//     return App\User::all();
// }); 
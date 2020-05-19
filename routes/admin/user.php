<?php

use Illuminate\Support\Facades\Route;

Route::get('users', 'Users\Get@users')->name('get-users');

Route::get('user/{uuid}', 'Users\Get@user')->name('get-user');

Route::post('users', 'Users\Create@users')->name('create-users');

Route::put('user', 'Users\Update@user')->name('update-user');

Route::delete('user', 'Users\Delete@user')->name('delete-user');

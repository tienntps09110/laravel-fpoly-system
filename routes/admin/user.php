<?php

use Illuminate\Support\Facades\Route;



Route::get('create-user', 'Users\Create@createUserView')->name('create-user-view');

Route::post('create-user', 'Users\Create@createUserPost')->name('create-user-post');

Route::delete('user', 'Users\Delete@user')->name('delete-user');

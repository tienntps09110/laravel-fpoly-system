<?php

use Illuminate\Support\Facades\Route;



Route::get('create-user', 'Users\Create@createUserView')->name('create-user-view');

Route::post('create-user', 'Users\Create@createUserPost')->name('create-user-post');

Route::get('update-user', 'Users\Update@userView')->name('update-user-view');

Route::put('user', 'Users\Update@user')->name('update-user');

Route::delete('user', 'Users\Delete@user')->name('delete-user');

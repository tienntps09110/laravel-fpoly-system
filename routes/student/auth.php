<?php

use Illuminate\Support\Facades\Route;


Route::get('student/login', 'Student\Auth@loginView')->name('student-login-view');

Route::post('student/login', 'Student\Auth@loginPost')->name('student-login-post');


Route::post('student/logout', 'Student\Auth@logout')->name('student-logout');


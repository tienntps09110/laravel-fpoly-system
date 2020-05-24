<?php

use Illuminate\Support\Facades\Route;


Route::get('create-class-subject', 'ClassSubject\Create@classSubjectView')->name('get-users');

Route::post('create-class-subject', 'ClassSubject\Create@classSubjectPost')->name('get-users-teachers');

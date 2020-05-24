<?php

use Illuminate\Support\Facades\Route;


Route::get('create-class-subject', 'ClassSubject\Create@classSubjectView')->name('create-class-subject-view');

Route::post('create-class-subject', 'ClassSubject\Create@classSubjectPost')->name('create-class-subject-post');

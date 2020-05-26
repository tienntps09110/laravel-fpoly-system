<?php

use Illuminate\Support\Facades\Route;


Route::get('create-class-subject', 'ClassSubject\Create@classSubjectView')->name('create-class-subject-view');

Route::post('create-class-subject', 'ClassSubject\Create@classSubjectPost')->name('create-class-subject-post');

Route::get('class-subjects', 'ClassSubject\Get@classSubjects')->name('get-class-subjects');

Route::get('class-subject/{id}', 'ClassSubject\Get@classSubjectDetail')->name('get-class-subject');

Route::delete('delete-class-subject', 'ClassSubject\Delete@classSubject')->name('delete-class-subject');

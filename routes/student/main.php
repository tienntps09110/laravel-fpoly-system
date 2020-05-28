<?php

use Illuminate\Support\Facades\Route;


Route::get('home', 'Student\Main@home')->name('student-home');


Route::get('get-class-subjects-student', 'Student\Main@classSubjectsView')->name('get-class-subjects-student');
Route::get('get-class-subjects-days-student', 'Student\Main@classSubjectAll')->name('get-class-subjects-days-student');


Route::get('get-class-subject-student/{classSubjectId}', 'Student\Main@classSubjectDetailView')->name('get-class-subject-detail-student');
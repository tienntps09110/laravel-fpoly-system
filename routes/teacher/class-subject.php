<?php

use Illuminate\Support\Facades\Route;


Route::get('class-subjects-teacher', 'ClassSubject\Get@classSubjectTeacher')->name('get-class-subjects-teacher');

Route::get('class-subject-teacher/{id}', 'ClassSubject\Get@detaiClassSubjectTeacher')->name('get-class-subject-teacher');

Route::get('class-subject-teacher-today', 'ClassSubject\Get@classSubjectTeacherToday')->name('get-class-subject-teacher-today');

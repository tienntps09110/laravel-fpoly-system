<?php

use Illuminate\Support\Facades\Route;

Route::get('get-attendance/{classSubjectId}/{dayStudyId}/create', 'Attendance\Get@attendanceView')->name('get-attendance-class-subject-today');
Route::get('get-attendance/{classSubjectId}/{dayStudyId}/update', 'Attendance\Get@attendanceUpdateView')->name('get-attendance-class-subject-update-today');

Route::post('attendance-students', 'Attendance\Create@attendance')->name('attendance-students-post');
Route::post('attendance-students-update', 'Attendance\Create@attendance')->name('attendance-students-update-post');

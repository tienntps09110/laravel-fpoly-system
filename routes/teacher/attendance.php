<?php

use Illuminate\Support\Facades\Route;

Route::get('get-attendance/{classSubjectId}/{dayStudyId}', 'Attendance\Get@attendanceView')->name('get-attendance-class-subject-today');

Route::post('attendance-students', 'Attendance\Create@attendance')->name('attendance-students-post');
<?php

use Illuminate\Support\Facades\Route;

Route::get('students', 'Students\Get@students')->name('get-students');
Route::get('student/{id}', 'Students\Get@student')->name('get-student');
Route::get('create-students-excel', 'Students\Create@studentsView')->name('create-student-excel');
Route::post('create-students-excel', 'Students\Create@studentsPost')->name('create-student-excel-post');

Route::get('update-student/{id}', 'Students\Update@studentView')->name('update-student');
Route::put('update-student', 'Students\Update@studentPut')->name('update-student-put');

Route::put('delete-student', 'Students\Delete@student')->name('delete-student');

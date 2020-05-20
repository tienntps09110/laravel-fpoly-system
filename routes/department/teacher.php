<?php

use Illuminate\Support\Facades\Route;

Route::get('create-teacher-excel', 'Users\CreateTeacher@teachersView')->name('create-teacher-excel');
Route::post('create-teacher-excel', 'Users\CreateTeacher@teachersPost')->name('create-teacher-excel-post');
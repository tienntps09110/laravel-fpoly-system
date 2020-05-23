<?php

use Illuminate\Support\Facades\Route;

Route::get('create-teachers-excel', 'Users\CreateTeacher@teachersView')->name('create-teacher-excel');
Route::post('create-teachers-excel', 'Users\CreateTeacher@teachersPost')->name('create-teacher-excel-post');
<?php

use Illuminate\Support\Facades\Route;

Route::get('home', 'Collaboration\Get@home')->name('collaboration-home');

// Route::get('dashboard', 'Collaboration\Get@noteTeacher')->name('collaboration-test');

Route::get('export-teachers-excel', 'Collaboration\ExportExcel@exportTeacher')->name('collaboration-excel-teacher');

Route::get('export-students-excel', 'Collaboration\ExportExcel@exportStudent')->name('collaboration-excel-student');
Route::get('export-class-excel', 'Collaboration\ExportExcel@exportClass')->name('collaboration-excel-class');

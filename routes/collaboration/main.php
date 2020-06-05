<?php

use Illuminate\Support\Facades\Route;

// ROUTE DASHBOARD HOME
Route::get('home', 'Collaboration\Get@home')->name('collaboration-home');

// COMPONENT DASHBOARD HOME
Route::get('component-count-all', 'Collaboration\Get@CountAllGet')->name('collaboration-component-count-all');
Route::get('component-dashboard-month', 'Collaboration\Get@DashboardMonth')->name('collaboration-component-dashboard-month');
Route::get('component-dashboard-radius', 'Collaboration\Get@DashboardRadius')->name('collaboration-component-dashboard-radius');
Route::get('component-note-teachers', 'Collaboration\Get@noteTeacherGet')->name('collaboration-component-note-teachers');

// Route::get('test-realtime', function(){
//     $data = (object)[
//         'channel'=> 'dashboard-home',
//         'route_name'=> route('collaboration-component-note-teachers')
//     ];
//     event(new App\Events\Dashboard\DashboardHome($data));
// });


// ROUTE EXPORT EXCEL
Route::get('export-teachers-excel', 'Collaboration\ExportExcel@exportTeacher')->name('collaboration-excel-teacher');
Route::get('export-students-excel', 'Collaboration\ExportExcel@exportStudent')->name('collaboration-excel-student');
Route::get('export-class-excel', 'Collaboration\ExportExcel@exportClass')->name('collaboration-excel-class');
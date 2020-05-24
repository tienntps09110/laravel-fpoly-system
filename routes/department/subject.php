<?php

use Illuminate\Support\Facades\Route;

// CREATE
Route::get('create-subject', 'Subjects\Create@subjectView')->name('create-subject-view');
Route::post('create-subject', 'Subjects\Create@subjectPost')->name('create-subject-post');

Route::get('get-subjects', 'Subjects\Get@subjects')->name('get-subjects');
Route::get('get-subject/{id}', 'Subjects\Get@subject')->name('get-subject');

Route::get('update-subject/{id}', 'Subjects\Update@subjectView')->name('update-subject-view');

Route::put('update-subject', 'Subjects\Update@subject')->name('update-subject-put');

Route::delete('delete-subject', 'Subjects\Delete@subject')->name('delete-subject');

<?php

use Illuminate\Support\Facades\Route;

// CREATE
Route::get('create-class', 'ClassC\Create@classView')->name('create-class-view');
Route::post('create-class', 'ClassC\Create@classPost')->name('create-class-post');

// GET
Route::get('class', 'ClassC\Get@classAll')->name('get-class');
Route::get('class/{id}', 'ClassC\Get@classDetail')->name('get-class-detail');

// UPDATE
Route::get('update-class/{id}', 'ClassC\Update@classView')->name('create-class-view');
Route::put('update-class', 'ClassC\Update@classPut')->name('create-class-put');

// DELETE
Route::delete('delete-class', 'ClassC\Create@classDelete')->name('delete-class');
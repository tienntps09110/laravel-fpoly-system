<?php

use Illuminate\Support\Facades\Route;

Route::get('home', 'Collaboration\Get@home')->name('collaboration-home');

Route::get('dashboard', 'Collaboration\Get@countUsers')->name('collaboration-home');

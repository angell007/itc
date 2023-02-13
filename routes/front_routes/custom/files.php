<?php

use Illuminate\Support\Facades\Route;

Route::post('file-upload', 'FileController@uploadData')->name('file-upload');
Route::get('datos-export', 'Admin\AdminController@datosexport')->name('datos-export');

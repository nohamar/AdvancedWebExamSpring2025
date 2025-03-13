<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::resource('students', StudentController::class);
Route::resource('courses', CourseController::class);
<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/students');
});

Route::resource('students', StudentController::class)
    ->except(['show']);

Route::resource('courses', CourseController::class)
    ->except(['show']);
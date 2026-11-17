<?php

use Illuminate\Support\Facades\Route;
use App\Models\Student;
use App\Models\Course;

Route::get('/', function () {
    return redirect('/students');
});

Route::get('/students', function () {
    $students = Student::all();

    return view('students.index', compact('students'));
});

Route::get('/students/create', function () {
    return view('students.create');
});

Route::post('/students', function () {
    request()->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:students,email',
        'phone' => 'required|string|max:20',
        'address' => 'nullable|string',
        'date_of_birth' => 'nullable|date',
    ]);

    Student::create(request()->only([
    'name',
    'email',
    'phone',
    'address',
    'date_of_birth',
]));

    return redirect('/students')
        ->with('success', 'Student created successfully.');
});

Route::get('/students/{student}/edit', function (Student $student) {
    return view('students.edit', compact('student'));
});

Route::put('/students/{student}', function (Student $student) {
    request()->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:students,email,' . $student->id,
        'phone' => 'required|string|max:20',
        'address' => 'nullable|string',
        'date_of_birth' => 'nullable|date',
    ]);

    $student->update(request()->all());

    return redirect('/students')
        ->with('success', 'Student updated successfully.');
});

Route::delete('/students/{student}', function (Student $student) {
    $student->delete();

    return redirect('/students')
        ->with('success', 'Student deleted successfully.');
});
// Course Routes

Route::get('/courses', function () {
    $courses = Course::all();

    return view('courses.index', compact('courses'));
});

Route::get('/courses/create', function () {
    return view('courses.create');
});

Route::post('/courses', function () {
    request()->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'fee' => 'required|numeric|min:0',
        'duration' => 'required|integer|min:1',
    ]);

    Course::create(request()->only([
        'name',
        'description',
        'fee',
        'duration',
    ]));

    return redirect('/courses')
        ->with('success', 'Course created successfully.');
});
// Edit Course
Route::get('/courses/{course}/edit', function (Course $course) {
    return view('courses.edit', compact('course'));
});

// Update Course
Route::put('/courses/{course}', function (Course $course) {

    request()->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'fee' => 'required|numeric|min:0',
        'duration' => 'required|integer|min:1',
    ]);

    $course->update(request()->only([
        'name',
        'description',
        'fee',
        'duration',
    ]));

    return redirect('/courses')
        ->with('success', 'Course updated successfully.');
});

// Delete Course
Route::delete('/courses/{course}', function (Course $course) {

    $course->delete();

    return redirect('/courses')
        ->with('success', 'Course deleted successfully.');
});
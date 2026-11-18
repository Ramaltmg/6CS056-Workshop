@extends('layouts.app')

@section('title', 'Edit Course')

@section('content')

<h1>Edit Course</h1>

<form action="/courses/{{ $course->id }}" method="POST">
    @csrf
    @method('PUT')

    <label>Course Name:</label><br>
    <input type="text" name="name"
           value="{{ old('name', $course->name) }}">
    @error('name')
        <p style="color:red">{{ $message }}</p>
    @enderror
    <br><br>

    <label>Description:</label><br>
    <textarea name="description">{{ old('description', $course->description) }}</textarea>
    <br><br>

    <label>Course Fee:</label><br>
    <input type="number" step="0.01" name="fee"
           value="{{ old('fee', $course->fee) }}">
    @error('fee')
        <p style="color:red">{{ $message }}</p>
    @enderror
    <br><br>

    <label>Duration (Months):</label><br>
    <input type="number" name="duration"
           value="{{ old('duration', $course->duration) }}">
    @error('duration')
        <p style="color:red">{{ $message }}</p>
    @enderror
    <br><br>

    <button type="submit">Update Course</button>
</form>

<br>

<a href="/courses">Back to Courses</a>

@endsection
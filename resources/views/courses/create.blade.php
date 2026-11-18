@extends('layouts.app')

@section('title', 'Add Course')

@section('content')

<h1>Add New Course</h1>

<form action="/courses" method="POST">
    @csrf

    <label>Course Name:</label><br>
    <input type="text" name="name" value="{{ old('name') }}">
    @error('name')
        <p style="color:red">{{ $message }}</p>
    @enderror
    <br><br>

    <label>Description:</label><br>
    <textarea name="description">{{ old('description') }}</textarea>
    @error('description')
        <p style="color:red">{{ $message }}</p>
    @enderror
    <br><br>

    <label>Course Fee:</label><br>
    <input type="number" step="0.01" name="fee" value="{{ old('fee') }}">
    @error('fee')
        <p style="color:red">{{ $message }}</p>
    @enderror
    <br><br>

    <label>Duration (Months):</label><br>
    <input type="number" name="duration" value="{{ old('duration') }}">
    @error('duration')
        <p style="color:red">{{ $message }}</p>
    @enderror
    <br><br>

    <button type="submit">Save Course</button>
</form>

<br>

<a href="/courses">Back to Courses</a>

@endsection
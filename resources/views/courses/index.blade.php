@extends('layouts.app')

@section('title', 'Courses')

@section('content')

<h1>Course Management</h1>

@if(session('success'))
    <x-alert type="success">
        {{ session('success') }}
    </x-alert>
@endif

<a href="/courses/create">Add New Course</a>

<br><br>

<table border="1" cellpadding="10">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Fee</th>
            <th>Duration (Months)</th>
            <th>Actions</th>
        </tr>
    </thead>

    <tbody>
        @forelse($courses as $course)
            <tr>
                <td>{{ $course->id }}</td>
                <td>{{ $course->name }}</td>
                <td>{{ $course->description }}</td>
                <td>{{ $course->fee }}</td>
                <td>{{ $course->duration }}</td>
                <td>
                    <a href="/courses/{{ $course->id }}/edit">Edit</a>

                    <form action="/courses/{{ $course->id }}" method="POST">
                        @csrf
                        @method('DELETE')

                        <button type="submit"
                            onclick="return confirm('Delete this course?')">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6">No courses available.</td>
            </tr>
        @endforelse
    </tbody>
</table>

<br>

<a href="/students">Go to Students</a>

@endsection
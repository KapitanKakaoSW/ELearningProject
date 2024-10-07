@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="my-4 text-center">Edit Courses</h1>

        <div class="mb-3">
            <a href="{{ route('home') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Back
            </a>
        </div>

        @can('admin')
            <div class="d-flex justify-content-end mb-3">
                <a href="{{ route('admin.courses.addcourse') }}" class="btn btn-primary">
                    <i class="fas fa-plus-circle"></i> Add Course
                </a>
            </div>
        @else
            <div class="alert alert-warning" role="alert">
                <i class="fas fa-exclamation-triangle"></i> Darf nicht.
            </div>
        @endcan

        @if($courses->isEmpty())
            <div class="alert alert-info" role="alert">
                <i class="fas fa-info-circle"></i> Gar nix.
            </div>
        @else
            <table class="table table-hover table-striped">
                <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Category</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($courses as $course)
                    <tr>
                        <td>{{ $course->id }}</td>
                        <td>{{ $course->title }}</td>
                        <td>{{ $course->description }}</td>
                        <td>{{ $course->category }}</td>
                        <td>
                            <a href="{{ route('admin.courses.edit', $course->id) }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form action="{{ route('admin.courses.destroy', $course->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash"></i> Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            @if (session('success'))
                <div class="alert alert-success mt-3">
                    <i class="fas fa-check-circle"></i> {{ session('success') }}
                </div>
            @endif
        @endif
    </div>
@endsection

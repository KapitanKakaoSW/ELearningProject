@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Hallo, {{ auth()->user()->name ?? 'guest' }}!</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(auth()->check() && auth()->user()->role === 'admin')
            <h2>Admin panel</h2>
            <a href="{{ route('admin.courses.index') }}">Edit courses</a>
        @else
        @if($courses->isEmpty())
                <p>gar nix.</p>
            @else
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>desc</th>
                        <th>category</th>
                        <th>actions</th>
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
                                <a href="{{ route('courses.contact', $course->id) }}" class="btn btn-primary btn-sm">anmelden</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        @endif
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit courses</h1>

        <div class="mb-3">
            <a href="#" class="btn btn-primary">course add</a>  {{-- Ссылка пока пустая --}}
            <a href="{{ route('home') }}" class = "btn btn-secondary">back</a>
        </div>


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
                            <a href="#" class="btn btn-warning btn-sm">edit</a> {{-- Ссылка на редактирование --}}
                            <form action="#" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection

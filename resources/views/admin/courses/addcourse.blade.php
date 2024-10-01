@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Course add</h1>

        {{-- Проверка, является ли пользователь администратором --}}
        @can('admin')
            <form action="{{ route('courses.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="title">title:</label>
                    <input type="text" name="title" id="title" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="description">desc:</label>
                    <textarea name="description" id="description" class="form-control" rows="5"></textarea>
                </div>

                <div class="form-group">
                    <label for="category">category:</label>
                    <input type="text" name="category" id="category" class="form-control">
                </div>

                <button type="submit" class="btn btn-primary">submit</button>
            </form>
        @else
            <p>darf nicht.</p>
        @endcan

    </div>
@endsection

@extends('layouts.app') {{-- Подключение основного шаблона, если есть --}}

@section('content')
    <h1>Course edit</h1>

    <div class="mb-3">
        <a href="{{ route('admin.courses.index') }}" class = "btn btn-secondary">back</a>
    </div>

    {{-- Проверка на ошибки валидации --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Форма редактирования курса --}}
    <form action="{{ route('admin.courses.update', $course->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">title</label>
            <input type="text" name="title" class="form-control" value="{{ $course->title }}" required>
        </div>

        <div class="form-group">
            <label for="description">desc</label>
            <textarea name="description" class="form-control">{{ $course->description }}</textarea>
        </div>

        <div class="form-group">
            <label for="category">category</label>
            <input type="text" name="category" class="form-control" value="{{ $course->category }}">
        </div>

        <button type="submit" class="btn btn-primary">update</button>
    </form>
@endsection

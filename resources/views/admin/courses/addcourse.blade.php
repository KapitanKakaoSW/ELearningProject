@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Добавить новый курс</h1>

        {{-- Проверка, является ли пользователь администратором --}}
        @can('admin')
            <form action="{{ route('courses.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="title">Название курса:</label>
                    <input type="text" name="title" id="title" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="description">Описание:</label>
                    <textarea name="description" id="description" class="form-control" rows="5"></textarea>
                </div>

                <div class="form-group">
                    <label for="category">Категория:</label>
                    <input type="text" name="category" id="category" class="form-control">
                </div>

                <button type="submit" class="btn btn-primary">Добавить курс</button>
            </form>
        @else
            <p>У вас нет прав для добавления курсов.</p>
        @endcan

    </div>
@endsection

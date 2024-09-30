@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Редактирование курсов</h1>

        <div class="mb-3">
            <a href="#" class="btn btn-primary">Добавить новый курс</a>  {{-- Ссылка пока пустая --}}
        </div>

        @if($courses->isEmpty())
            <p>Курсы не найдены.</p>
        @else
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Название</th>
                    <th>Описание</th>
                    <th>Категория</th>
                    <th>Действия</th>
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
                            <a href="#" class="btn btn-warning btn-sm">Редактировать</a> {{-- Ссылка на редактирование --}}
                            <form action="#" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Удалить</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection

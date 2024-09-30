@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Hallo, {{ auth()->user()->name }}!</h1>

        @if(auth()->user()->role === 'admin')
            <h2>Admin panel</h2>
            <a href="#">Edit courses</a> <!-- Здесь будут ссылки для админа -->
        @else
            <h2>List of courses</h2>
            <ul>
                <li>Course 1</li>
                <li>Course 2</li>
            </ul>
        @endif
    </div>
@endsection

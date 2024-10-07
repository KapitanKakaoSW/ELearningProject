@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Hinterlassen Sie Ihre Kontaktinformationen für den Kurs: {{ $course->title }}</h1>
        <p>Kursbeschreibung: {{ $course->description }}</p>
        <p>Kategorie: {{ $course->category }}</p>

        <form action="{{ route('courses.contact.store', $course->id) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="phone">Telefonnummer:</label>
                <input type="text" name="phone" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success">Senden</button>
        </form>
    </div>
@endsection

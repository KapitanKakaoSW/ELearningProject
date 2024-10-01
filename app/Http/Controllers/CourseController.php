<?php

namespace App\Http\Controllers;

use Illuminate\Auth;
use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller {

    public function index() {
        $courses = Course::all();
        return view('admin.courses.index', compact('courses'));
    }

    public function addcourse() {
        return view('admin.courses.addcourse');
    }

    // Метод для сохранения курса
    public function store(Request $request) {
        // Валидация входных данных
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
            'category' => 'nullable|max:100',
        ]);

        // Создание нового курса в базе данных
        Course::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'category' => $validated['category'],
        ]);

        // Редирект обратно с успешным сообщением
        return redirect()->route('admin.courses.addcourse')->with('success', 'Курс успешно добавлен!');
    }
}

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
        return view('admin.courses.add');
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

        // Редирект на страницу со списком курсов с успешным сообщением
        return redirect()->route('admin.courses.index')->with('success', 'Kurs erfolgreich hinzugefügt!');
    }

    public function edit($id) {
        // Найти курс по ID
        $course = Course::findOrFail($id);

        // Вернуть представление с формой редактирования
        return view('admin.courses.edit', compact('course'));
    }

    public function update(Request $request, $id) {
        // Валидация данных
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
            'category' => 'nullable|max:100',
        ]);

        // Поиск курса по ID и обновление его данных
        $course = Course::findOrFail($id);
        $course->update([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'category' => $validated['category'],
        ]);

        // Редирект обратно с сообщением об успешном обновлении
        return redirect()->route('admin.courses.index')->with('success', "Kurs mit der ID {$id} erfolgreich aktualisiert!");
    }

    public function destroy($id) {
        // Поиск курса по ID и удаление его
        $course = Course::findOrFail($id);
        $course->delete();

        // Редирект обратно с успешным сообщением и id курса
        return redirect()->route('admin.courses.index')->with('success', "Kurs mit der ID {$id} erfolgreich gelöscht!");
    }


}

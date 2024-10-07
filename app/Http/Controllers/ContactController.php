<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller {
    public function showContactForm($id) {
        $course = Course::findOrFail($id); // Находим курс по ID
        return view('contacts.form', compact('course'));
    }

    public function storeContact(Request $request, $id) {
        $course = Course::findOrFail($id);

        // Валидация данных
        $request->validate([
            'email' => 'required|email',
            'phone' => 'required',
        ]);

        // Сохранение данных контактов
        Contact::create([
            'course_id' => $course->id,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);

        return redirect()->route('home')->with('success', 'Kontaktdaten erfolgreich gesendet.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class CourseController extends Controller {

    public function index()
    {
        $courses = Course::all();
        return view('admin.courses.index', compact('courses'));
    }
}

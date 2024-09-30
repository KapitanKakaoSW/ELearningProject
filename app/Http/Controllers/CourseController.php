<?php

namespace App\Http\Controllers;

use Illuminate\Auth;
use App\Http\Controllers\Controller;
use App\Models\Course;

class CourseController extends Controller {

    public function index()
    {
        $courses = Course::all();
        return view('admin.courses.index', compact('courses'));
    }
}

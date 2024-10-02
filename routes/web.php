<?php

use App\Http\Controllers\CourseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/courses/create', [CourseController::class, 'addcourse'])->name('admin.courses.addcourse');
    Route::post('/admin/courses', [CourseController::class, 'store'])->name('courses.store');
    Route::get('/admin/courses', [CourseController::class, 'index'])->name('admin.courses.index');
    Route::get('/admin/courses/{id}/edit', [CourseController::class, 'edit'])->name('admin.courses.edit');
    Route::put('/admin/courses/{id}', [CourseController::class, 'update'])->name('admin.courses.update');
    Route::delete('/admin/courses/{id}', [CourseController::class, 'destroy'])->name('admin.courses.destroy');
});

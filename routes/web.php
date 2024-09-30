<?php

use App\Http\Controllers\CourseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Auth::routes();

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/courses', [CourseController::class, 'index'])->name('admin.courses.index');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

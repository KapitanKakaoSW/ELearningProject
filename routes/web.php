<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');


Auth::routes();

Route::group(['middleware' => ['auth', 'admin']], function() {
    Route::get('/courses/edit', [CourseController::class, 'edit'])->name('courses.edit');
    Route::post('/courses/update', [CourseController::class, 'update'])->name('courses.update');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


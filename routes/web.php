<?php

use App\Http\Controllers\CourseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Log;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/test-admin', function () {
    return 'Admin middleware works!';
})->middleware('admin');

Auth::routes();

Route::middleware(['admin'])->group(function () {
    Log::info('Middleware group triggered');
    Route::get('/admin/courses', [CourseController::class, 'index'])->name('admin.courses.index');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

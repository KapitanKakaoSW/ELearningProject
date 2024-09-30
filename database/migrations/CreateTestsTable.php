<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestsTable extends Migration {

    public function up() {
        Schema::create('tests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_id')->constrained('courses')->onDelete('cascade');
            $table->string('question');
            $table->json('options');  // Хранение вариантов ответов в виде JSON
            $table->string('correct_answer');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('tests');
    }
}

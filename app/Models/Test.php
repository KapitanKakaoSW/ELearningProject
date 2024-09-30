<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Test extends Model {

    protected $fillable = [
        'course_id',
        'question',
        'correct_answer',
        'options'
    ];

    public function courses() {
        return $this->belongsTo(Course::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = ['course_id', 'email', 'phone'];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}


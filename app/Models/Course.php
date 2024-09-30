<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model {

    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'category'
    ];

    public function tests() {
        return $this->hasOne(Test::class);
    }

    public function users() {
        return $this->belongsToMany(User::class, 'enrollments');
    }
}

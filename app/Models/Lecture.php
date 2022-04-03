<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lecture extends Model
{
    use HasFactory;

    protected $fillable = [
        'title' ,
        'description' ,
        'course_id' ,
        'sort' ,
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}

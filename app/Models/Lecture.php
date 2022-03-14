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
        'index' ,
        'finished_at'
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinishedLecture extends Model
{
    use HasFactory;

    protected $fillable = [
        'lecture_id' ,
        'student_id'
    ];

    public function lecture()
    {
        return $this->belongsTo(Lecture::class);
    }
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}

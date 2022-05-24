<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'name' ,
	    'description' ,
	    'teacher_id' ,
		'category_id' ,
    ];
    public function badges()
    {
        return $this->hasMany(Badge::class);
    }
    public function students()
    {
        return $this->belongsToMany(Student::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }
    public function lectures()
    {
        return $this->hasMany(Lecture::class);
    }
    public function enrollments()
     {
        return $this->hasMany(Enrollment::class);
     }
}


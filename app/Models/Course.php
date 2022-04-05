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
<<<<<<< HEAD
    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }
=======
>>>>>>> 8b1bb7f4e74d2da926784277bf9abdf28c96a48f
    public function lectures()
    {
        return $this->hasMany(Lecture::class);
    }
}

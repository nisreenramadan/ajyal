<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;


class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'age',
    ];

    public function user()
    {
       return $this->belongsTo(User::class);
    }
    public function badges()
     {
        return $this->hasMany(Badge::class);
     }
     public function comments()
     {
        return $this->hasMany(Comment::class);
     }
     public function likes()
     {
        return $this->hasMany(Like::class);
     }
     public function courses()
    {
        return $this->belongsToMany(Course::class);
    }
    public function enrollments()
     {
        return $this->hasMany(Enrollment::class);
     }

}

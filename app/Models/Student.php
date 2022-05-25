<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Student extends Model implements HasMedia
{
    use HasFactory , InteractsWithMedia;

    protected $fillable = [
        'user_id',
        'age',
        'bio'
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
    public function books()
    {
        return $this->belongsToMany(Book::class);
    }
    public function enrollments()
     {
        return $this->hasMany(Enrollment::class);
     }
    public function finishedLectures()
    {
        return $this->hasMany(FinishedLecture::class);
    }


}

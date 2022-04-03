<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'scientific_grade',
		'scientific_certificate',
    ];

    public function user()
    {
       return $this->belongsTo(User::class);
    }
    public function posts()
     {
        return $this->hasMany(Post::class);
     }
     public function courses()
     {
        return $this->hasMany(Course::class);
     }
}

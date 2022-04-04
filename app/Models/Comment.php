<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'content' ,
        'post_id' ,
        'student_id'
    ];
    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

}

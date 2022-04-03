<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title' ,
        'qoates',
        'link',
        'category_id',
        'author'
    ];


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // public function authors()
    // {
    //     return $this->belongsToMany(Author::class);
    // }
}

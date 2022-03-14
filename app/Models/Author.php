<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $fillable = [
        'الأسم الأول' ,
        'الأسم الأخير' ,
        'الأيميل' ,
        'لمحة'
    ];

    public function books()
    {
        return $this->belongsToMany(Book::class);
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function articles()
    {
        return $this->morphedByMany(Article::class, 'categorizable');
    }

    public function courses()
    {
        return $this->morphedByMany(Course::class, 'categorizable');
    }
}

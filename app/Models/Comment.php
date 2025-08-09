<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'text',
    ];

    public function article()
    {
        return $this->morphTo(Article::class);
    }

    public function course()
    {
        return $this->morphTo(Course::class);
    }
}

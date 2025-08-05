<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'title',
        'context',
        'image',
        'user_id'
    ];
    public function getImageUrlAttribute()
    {
        return $this->image ? asset('storage/' . $this->image) : null;
    }

    public function getExcerptAttribute()
    {
        return str()->limit(strip_tags($this->content), 100);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'excerpt',
        'body',
        'slug',
        'image',
        'published'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function getImageUrlAttribute()
    {
        return $this->image ? asset($this->image) : null;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

 
    public function categories()
    {
        return $this->morphToMany(Category::class , 'categorizable');
    }

    public function views()
    {
        return $this->morphMany(View::class , 'viewable');
    }
    
    public function comments()
    {
        return $this->morphMany(Comment::class , 'commentable');
    }
}

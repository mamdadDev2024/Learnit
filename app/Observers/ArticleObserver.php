<?php

namespace App\Observers;

use App\Jobs\ProcessArticleImage;
use App\Jobs\DeleteArticleImage;
use App\Models\Article;
use Illuminate\Support\Str;

class ArticleObserver
{
    public function creating(Article $article): void
    {
        if (empty($article->slug)) {
            $article->slug = Str::slug($article->title);
            $article->saveQuietly();
        }
    }
    public function created(Article $article): void
    {
        if ($article->image) {
            ProcessArticleImage::dispatch($article->image);
        }
    }

    public function updated(Article $article): void
    {
        if ($article->isDirty('image') && $article->image) {
            ProcessArticleImage::dispatch($article->image);
        }

        if ($article->isDirty('title')) {
            $article->slug = Str::slug($article->title);
            $article->saveQuietly();
        }
    }

    public function deleted(Article $article): void
    {
        if ($article->image) {
            DeleteArticleImage::dispatch($article->image);
        }
    }
    public function restored(Article $article): void
    {
    }
    public function forceDeleted(Article $article): void
    {
        if ($article->image) {
            DeleteArticleImage::dispatch($article->image);
        }
    }
}

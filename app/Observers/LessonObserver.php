<?php

namespace App\Observers;

use App\Models\Lesson;
use App\Jobs\ProcessLessonVideo;
use App\Jobs\DeleteLessonVideo;
use Illuminate\Support\Str;

class LessonObserver
{
    public function creating(Lesson $lesson): void
    {
        if (empty($lesson->slug)) {
            $lesson->slug = Str::slug($lesson->title);
        }
    }

    public function created(Lesson $lesson): void
    {
        if ($lesson->video) {
            ProcessLessonVideo::dispatch($lesson->video);
        }
    }

    public function updated(Lesson $lesson): void
    {
        if ($lesson->isDirty('video') && $lesson->video) {
            ProcessLessonVideo::dispatch($lesson->video);
        }

        if ($lesson->isDirty('title')) {
            $lesson->slug = Str::slug($lesson->title);
            $lesson->saveQuietly();
        }
    }

    public function deleted(Lesson $lesson): void
    {
        if ($lesson->video) {
            DeleteLessonVideo::dispatch($lesson->video);
        }
    }

    public function forceDeleted(Lesson $lesson): void
    {
        if ($lesson->video) {
            DeleteLessonVideo::dispatch($lesson->video);
        }
    }
}

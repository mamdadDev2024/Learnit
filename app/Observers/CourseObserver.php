<?php

namespace App\Observers;

use App\Models\Course;
use App\Jobs\ProcessCourseImage;
use App\Jobs\DeleteCourseImage;
use Illuminate\Support\Str;

class CourseObserver
{
    public function creating(Course $course): void
    {
        if (empty($course->slug)) {
            $course->slug = Str::slug($course->title);
        }
    }

    public function created(Course $course): void
    {
        if ($course->image) {
            ProcessCourseImage::dispatch($course->image);
        }
    }

    public function updated(Course $course): void
    {
        if ($course->isDirty('image') && $course->image) {
            ProcessCourseImage::dispatch($course->image);
        }

        if ($course->isDirty('title')) {
            $course->slug = Str::slug($course->title);
            $course->saveQuietly();
        }
    }

    public function deleted(Course $course): void
    {
        if ($course->image) {
            DeleteCourseImage::dispatch($course->image);
        }
    }

    public function forceDeleted(Course $course): void
    {
        if ($course->image) {
            DeleteCourseImage::dispatch($course->image);
        }
    }
}

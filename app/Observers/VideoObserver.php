<?php

namespace App\Observers;

use App\Models\Video;
use App\Jobs\ConvertVideoToMultipleQualities;
use App\Jobs\GenerateVideoThumbnail;
use App\Jobs\DeleteVideoFile;

class VideoObserver
{
    public function created(Video $video): void
    {
        if ($video->file_path) {
            ConvertVideoToMultipleQualities::dispatch($video->file_path);
            GenerateVideoThumbnail::dispatch($video->file_path);
        }
    }

    public function updated(Video $video): void
    {
        if ($video->isDirty('file_path') && $video->file_path) {
            ConvertVideoToMultipleQualities::dispatch($video->file_path);
            GenerateVideoThumbnail::dispatch($video->file_path);
        }
    }

    public function deleted(Video $video): void
    {
        if ($video->file_path) {
            DeleteVideoFile::dispatch($video->file_path);
        }
    }

    public function forceDeleted(Video $video): void
    {
        if ($video->file_path) {
            DeleteVideoFile::dispatch($video->file_path);
        }
    }
}

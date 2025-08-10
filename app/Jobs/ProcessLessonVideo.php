<?php

namespace App\Jobs;

use FFMpeg\FFMpeg;
use App\Models\Video;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class ProcessLessonVideo implements ShouldQueue
{
    use Queueable;

    public function __construct(public Video $video){}

    public function handle()
    {
        // فشرده‌سازی ویدیو
        FFMpeg::fromDisk('local')
            ->open($this->video->path)
            ->export()
            ->toDisk('s3')
            ->inFormat(new \FFMpeg\Format\Video\X264)
            ->save('videos/'.$this->video->id.'/720p.mp4');

        // بروزرسانی وضعیت
        $this->video->update(['status' => 'processed']);
}

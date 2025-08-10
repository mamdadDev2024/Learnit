<?php
namespace App\Livewire\Course;

use App\Jobs\CreateVideoJob;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Comment;
use Masmerise\Toaster\Toaster;

class Panel extends Component
{
    use WithFileUploads;

    public Course $course;

    public $name, $description, $price, $image, $newImage;
    public $lessons;
    public $comments;

    public $lessonVideo;
    public $lessonTitle = '';
    public $lessonDescription = '';

    protected $rules = [
        'name' => 'required|string|max:255|min:5',
        'description' => 'required|string',
        'price' => 'required|numeric|min:0',
        'newImage' => 'nullable|image|max:2048',
        'lessonTitle' => 'required|string|max:255',
        'lessonDescription' => 'required|string',
        'lessonVideo' => 'required|file|video',
    ];

    public function mount(Course $Course)
    {
    $this->course = $Course->load('lessons')->loadCount(['comments' , 'views']);

    $this->name = $this->course->name;
    $this->description = $this->course->description;
    $this->price = $this->course->price;
    $this->image = $this->course->image;

    $this->lessons = $this->course->lessons;
    $this->comments = $this->course->comments;
    }

    public function updateCourse()
    {
        $data['name'] = $this->validateOnly('name');
        $data['description'] = $this->validateOnly('description');
        $data['price'] = $this->validateOnly('price');
        $data['newImage'] = $this->validateOnly('newImage');

        $data = [
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
        ];

        if ($this->newImage) {
            if ($this->course->image)
                Storage::disk('public')->delete($this->course->image);
            $data['image'] = $this->newImage->store('courses');
            $this->image = $data['image'];
        }

        $this->course->update($data);

        Toaster::success('اطلاعات دوره با موفقیت به‌روزرسانی شد');
    }

    public function addLesson()
    {
        $lessonTitle = $this->validateOnly('lessonTitle');
        $lessonDescription = $this->validateOnly('lessonDescription');
        $video = $this->validateOnly('lessonVideo');
        $lesson = Lesson::create([
            'course_id' => $this->course->id,
            'title' => $lessonTitle,
            'description' => $lessonDescription,
        ]);


        $this->lessons->push($lesson);

        if (!$video)
            throw ValidationException::withMessages([
                'lessonVideo' => 'مشکل داردویدیو ی ارسالی ',
            ]);
        $videoPath = $this->lessonVideo->store('lessons' , 'public');
        CreateVideoJob::dispatch($videoPath);

        $this->lessonTitle = '';
        $this->lessonDescription = '';

        Toaster::success('جدید ثبت شد و در صف تایید است درس ');
    }

    // حذف درس
    public function deleteLesson($lessonId)
    {
    $lesson = Lesson::findOrFail($lessonId);
    $lesson->delete();

    $this->lessons = $this->lessons->filter(fn($l) => $l->id !== $lessonId);

    Toaster::success('درس حذف شد');
    }

    // تایید نظر
    public function approveComment($commentId)
    {
    $comment = Comment::findOrFail($commentId);
    $comment->update(['is_approved' => true]);

    $this->comments = $this->comments->map(function($c) use ($commentId) {
    if ($c->id == $commentId) $c->is_approved = true;
    return $c;
    });

    Toaster::success('نظر تایید شد');
    }

    public function deleteComment($commentId)
    {
    $comment = Comment::findOrFail($commentId);
    $comment->delete();

    $this->comments = $this->comments->filter(fn($c) => $c->id !== $commentId);

    Toaster::success('حذف شدنظر ');
    }

    public function render()
    {
        return view('livewire.course.panel');
    }
}

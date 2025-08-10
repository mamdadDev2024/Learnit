<?php

namespace App\Livewire\Course;

use Livewire\Component;
use App\Models\Course;
use Livewire\WithPagination;
use Masmerise\Toaster\Toaster;

class Manage extends Component
{
    use WithPagination;

    public $search = '';
    public $perPage = 10;

    protected $listeners = [
        'courseDeleted' => 'handleCourseDeleted',
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function deleteCourse($id)
    {
        $course = Course::findOrFail($id);
        $course->delete();

        Toaster::success('دوره با موفقیت حذف شد.');
        $this->emit('courseDeleted');
    }

    public function handleCourseDeleted()
    {
        $this->resetPage();
    }

    public function render()
    {
        $courses = Course::where('name', 'like', "%{$this->search}%")
            ->orderBy('created_at', 'desc')
            ->paginate($this->perPage);

        return view('livewire.course.manage', compact('courses'));
    }
}

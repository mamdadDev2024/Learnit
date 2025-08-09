<?php

namespace App\Livewire\Course;

use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Course;
use Masmerise\Toaster\Toaster;

class Create extends Component
{
    use WithFileUploads;

    #[Validate('required|numeric|min:0')]
    public $price;

    #[Validate('required|string|max:255')]
    public $name;

    #[Validate('nullable|string')]
    public $description;

    #[Validate('required|image|max:2048')]
    public $image;

    public function createCourse()
    {
        $data = $this->validate();

        $data['image'] = $this->image->store('courses', 'public');

        Course::create($data);

        Toaster::success('دوره با موفقیت ذخیره شد و متنظر تایید است');
        return redirect()->route('course.index');
    }

    public function render()
    {
        return view('livewire.course.create');
    }
}

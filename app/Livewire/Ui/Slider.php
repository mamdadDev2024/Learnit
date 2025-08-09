<?php
namespace App\Livewire\Ui;

use App\Models\Course;
use Livewire\Component;

class Slider extends Component
{
    public $courses;

    public function mount()
    {
       $this->courses = Course::take(5)->orderByDesc('created_at')->get();
    }

    public function render()
    {
        return view('livewire.ui.slider');
    }
}

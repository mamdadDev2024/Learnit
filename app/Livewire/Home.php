<?php

namespace App\Livewire;

use App\Models\Course;
use Livewire\Component;
use Livewire\WithPagination;

class Home extends Component
{
    use WithPagination;

    public function mount()
    {

    }
    public function render()
    {
        return view('livewire.home' , [
            'courses' => Course::paginate(10)
        ]);
    }
}

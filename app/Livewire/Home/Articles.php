<?php

namespace App\Livewire\Home;

use App\Models\Article;
use Livewire\Component;

class Articles extends Component
{
    public $articles;

    public function mount()
    {
        $this->articles = Article::latest()->take(4)->get(); 
    }

    public function render()
    {
        return view('livewire.home.articles');
    }
}

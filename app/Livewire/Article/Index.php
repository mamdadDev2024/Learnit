<?php

namespace App\Livewire\Article;

use App\Models\Article;
use Livewire\Component;

class Index extends Component
{
    
    public function render()
    {
        return view('livewire.article.index' , [
            'articles' => Article::latest()->paginate(10)
        ]);
    }
}

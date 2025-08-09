<?php

namespace App\Livewire\Course;

use App\Models\Article;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    
    public function render()
    {
        $articles = Article::with('user')->withCount([
            'views' , 'comments'
        ])->paginate(10);
        return view('livewire.course.index' , [
            'articles' => $articles
        ]);
    }
}

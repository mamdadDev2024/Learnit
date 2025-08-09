<?php

namespace App\Livewire\Article;

use App\Models\Article;
use Livewire\Component;

class Show extends Component
{
    public $article;

    public function mount(Article $Article)
    {
        $this->article = $Article->load([
            'user',
            'comments',
        ])->loadCount('views');
    }
    public function render()
    {
        return view('livewire.article.show');
    }
}

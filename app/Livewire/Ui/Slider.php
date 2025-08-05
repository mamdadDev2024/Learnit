<?php
namespace App\Livewire\Ui;

use Livewire\Component;

class Slider extends Component
{
    public array $slides = [];

    public function mount($slides = [])
    {
    $this->slides = $slides ?: [
    [
    'title' => 'یادگیری برنامه‌نویسی از صفر',
    'description' => 'با دوره‌های پروژه‌محور ما، سریع و کاربردی یاد بگیر!',
    'image' => '/images/slide1.jpg',
    'link' => route('courses.index'),
    ],
        [
            'title' => 'پیشرفت روز به روز!',
            'description' => 'با مقالات و تمرین‌های روزانه، همیشه در مسیر باش.',
            'image' => '/images/slide2.jpg',
            'link' => route('articles.index'),
        ],
    ];
    }

    public function render()
    {
        return view('livewire.ui.slider');
    }
}

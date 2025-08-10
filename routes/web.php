<?php

use App\Livewire\Article\Index as ArticleIndex;
use App\Livewire\Course\Index as CourseIndex;
use App\Livewire\Course\Show as CourseShow;
use App\Livewire\Article\Show as ArticleShow;
use App\Livewire\Course\Create as CourseCreate;
use App\Livewire\Categories;
use Illuminate\Support\Facades\Route;

Route::get('/', \App\Livewire\Home::class)->name('home');


Route::as('course.')->prefix('course')->group(function (){
    Route::get('' , CourseIndex::class)->name('index');
    Route::get('manage' , \App\Livewire\Course\Manage::class)->name('manage');
    Route::get('create' , CourseCreate::class)->name('create');
    Route::get('{Course}' , CourseShow::class)->name('show');
    Route::get('{Course}/edit' , \App\Livewire\Course\Edit::class)->name('edit');
    Route::get('{Course}/manage' , \App\Livewire\Course\Panel::class)->name('edit');

});

Route::get('categories' , Categories::class)->name('category.show');

Route::as('article.')->prefix('article')->group(function (){
    Route::get('' , ArticleIndex::class)->name('index');
    Route::get('{Article}' , ArticleShow::class)->name('show');
});

require __DIR__.'/Auth.php';
require __DIR__.'/User.php';

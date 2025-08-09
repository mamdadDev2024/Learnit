<?php

use App\Livewire\Article\Index as ArticleIndex;
use App\Livewire\Course\Index as CourseIndex;
use App\Livewire\Course\Show as CourseShow;
use App\Livewire\Article\Show as ArticleShow;
use App\Livewire\Categories;
use Illuminate\Support\Facades\Route;

Route::get('/', \App\Livewire\Home::class)->name('home');


Route::as('course.')->prefix('course')->group(function (){
    Route::get('' , CourseIndex::class)->name('index');
    Route::get('{Course}' , CourseShow::class)->name('show');

});

Route::get('categories' , Categories::class)->name('category.show');

Route::as('article.')->prefix('article')->group(function (){
    Route::get('' , ArticleIndex::class)->name('index');
    Route::get('{Article}' , ArticleShow::class)->name('show');
});

require __DIR__.'/Auth.php';
require __DIR__.'/User.php';

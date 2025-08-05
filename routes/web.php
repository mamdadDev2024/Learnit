<?php

use Illuminate\Support\Facades\Route;

Route::get('/', \App\Livewire\Home::class)->name('home');

require __DIR__.'/Auth.php';
require __DIR__.'/User.php';

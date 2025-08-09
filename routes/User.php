<?php

use Illuminate\Support\Facades\Route;

Route::prefix('user')->middleware('auth')->as('user.')->group(function(){
    Route::get('' , \App\Livewire\User\Profile::class)->name('profile');
});

<?php

use Illuminate\Support\Facades\Route;

Route::prefix('user')->as('user.')->group(function(){
    Route::get('' , \App\Livewire\User\Profile::class)->name('profile');
});

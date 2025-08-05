<?php

use Illuminate\Support\Facades\Route;

Route::prefix('auth')->middleware('guest')->group(function () {
    Route::get('login', \App\Livewire\Auth\Login::class)->name('login');
    Route::get('register', \App\Livewire\Auth\Register::class)->name('register');
});

Route::middleware('auth')->post('auth/logout' , function (){
    \Illuminate\Support\Facades\Auth::logout();
    return redirect()->route('login');
})->name('logout');

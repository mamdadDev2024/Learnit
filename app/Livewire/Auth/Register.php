<?php

namespace App\Livewire\Auth;

use App\Contracts\BaseService;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class Register extends Component
{
    #[Validate('required|email|exists:users,email')]
    public string $email;

    #[Validate('required|string')]
    public string $name;
    #[Validate('required|string|min:6|confirmed')]
    public string $password;

    public function render()
    {
        return view('livewire.auth.register');
    }

    public function register()
    {
        $data = $this->validate();

        $response = app(BaseService::class)(function () use($data) {
            $user = User::create($data);
            Auth::login($user);
        });

        if ($response->success){
            Toaster::error('Something went wrong!');
        }
    }
}

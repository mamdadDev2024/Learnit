<?php

namespace App\Livewire\Auth;

use App\Contracts\BaseService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Masmerise\Toaster\Toast;
use Masmerise\Toaster\Toaster;

class Login extends Component
{
    #[Validate('email|required|exists:users,email')]
    public $email;

    #[Validate('string|required|min:6')]
    public $password;

    public function render()
    {
        return view('livewire.auth.login');
    }

    public function login()
    {
        $data = $this->validate();

        $response = app(BaseService::class)(function () use ($data){
            if (Auth::attempt(['email' => $data['email'], 'password' => $data['password']])){
                $this->redirectRoute('home');
            }
            throw ValidationException::withMessages([
                'email' => __('auth.failed'),
            ]);
        });

        if ($response->success){
            Toaster::error('Something went wrong!');
        }
    }
}

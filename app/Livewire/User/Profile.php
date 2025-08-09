<?php

namespace App\Livewire\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Masmerise\Toaster\Toaster;

class Profile extends Component
{
    use WithFileUploads;

    public $email;
    public $name;
    public $image;
    public $currentAvatar;

    public function mount()
    {
        $user = Auth::user();
        $this->name = $user->name;
        $this->email = $user->email;
        $this->currentAvatar = $user->avatar
            ? asset($user->avatar)
            : null;
    }

    public function rules()
    {
        return [
            'email' => 'required|email|unique:users,email,' . Auth::id(),
            'name'  => 'required|string|min:3|max:50|unique:users,name,' . Auth::id(),
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:1024',
        ];
    }

    public function update()
    {
        $this->validate();

        $user = Auth::user();
        $user->name = $this->name;
        $user->email = $this->email;
        if ($this->image) {
            if ($user->avatar && Storage::disk('public')->exists($user->avatar)) {
                Storage::disk('public')->delete($user->avatar);
            }

            $path = $this->image->store('avatars', 'public');
            $user->avatar = $path;
            $this->currentAvatar = asset($path);
        }

        $user->save();

        Toaster::success('پروفایل شما با موفقیت ذخیره شد');
    }

    public function render()
    {
        return view('livewire.user.profile');
    }
}

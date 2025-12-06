<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Login extends Component
{
    public string $email = '';
    public string $password = '';
    public bool $remember = false;

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required|min:6',
    ];

    protected $messages = [
        'email.required' => 'Имейл адресът е задължителен.',
        'email.email' => 'Моля въведете валиден имейл адрес.',
        'password.required' => 'Паролата е задължителна.',
        'password.min' => 'Паролата трябва да е поне 6 символа.',
    ];

    public function login()
    {
        $this->validate();

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) {
            session()->regenerate();

            return redirect()->intended(route('admin.dashboard'));
        }

        $this->addError('email', 'Невалидни данни за вход.');
    }

    public function render()
    {
        return view('livewire.auth.login')
            ->layout('layouts.guest');
    }
}

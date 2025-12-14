<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class LoginModal extends Component
{
    public $isOpen = false;
    public $email = '';
    public $password = '';
    public $remember = false;

    protected $listeners = ['open-login-modal' => 'openModal'];

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function authenticate()
    {
        $this->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) {
            $this->isOpen = false;
            $this->dispatch('login-success'); // Trigger AddToCart
            $this->reset(['email', 'password']);
        } else {
            $this->addError('email', 'These credentials do not match our records.');
        }
    }

    public function render()
    {
        return view('livewire.auth.login-modal');
    }
}

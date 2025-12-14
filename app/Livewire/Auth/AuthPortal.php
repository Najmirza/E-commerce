<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Auth\Events\Registered;

class AuthPortal extends Component
{
    // State: 'signin', 'signup', 'recovery'
    public $tab = 'signin';

    // Sign In Fields
    public $login_email = '';
    public $login_password = '';
    public $remember = false;

    // Sign Up Fields
    public $register_name = '';
    public $register_email = '';
    public $register_password = '';
    public $register_password_confirmation = '';
    public $register_country = 'United States'; // Default placeholder

    // Recovery Fields
    public $recovery_email = '';

    public function switchTab($tab)
    {
        $this->tab = $tab;
        $this->resetErrorBag();
    }

    public function login()
    {
        $this->tab = 'signin';
        $this->validate([
            'login_email' => 'required|email',
            'login_password' => 'required',
        ]);

        if (Auth::attempt(['email' => $this->login_email, 'password' => $this->login_password], $this->remember)) {
            session()->regenerate();
            
            // Redirect based on role or context
            return redirect()->intended(route('home'));
        }

        $this->addError('login_email', 'The provided credentials do not match our records.');
    }

    public function register()
    {
        $this->tab = 'signup';
        $this->validate([
            'register_name' => 'required|string|max:255',
            'register_email' => 'required|string|email|max:255|unique:users,email',
            'register_password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $this->register_name,
            'email' => $this->register_email,
            'password' => Hash::make($this->register_password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('home'));
    }

    public function recover()
    {
        $this->tab = 'recovery';
        $this->validate(['recovery_email' => 'required|email|exists:users,email']);
        
        // In a real app, send password reset link here
        // Password::sendResetLink(['email' => $this->recovery_email]);

        session()->flash('status', 'We have emailed your password reset link!');
        $this->login_email = $this->recovery_email;
        $this->switchTab('signin');
    }

    public function render()
    {
        return view('livewire.auth.auth-portal')->extends('layouts.auth')->section('content');
    }
}

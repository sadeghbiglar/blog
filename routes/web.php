<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Volt::route('/register', 'register');
Volt::route('/login', 'login')->name('login');

// Define the logout
Route::get('/logout', function () {
    auth()->logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/');
});

Route::middleware('auth')->group(function () {
    Volt::route('/', 'index')->name('home');
    Volt::route('/dashboard', 'dashboard')->name('dashboard');
    Volt::route('/users', 'users.index')->name('users.index');
    Volt::route('/users/create', 'users.create')->name('users.create');
    Volt::route('/users/{user}/edit', 'users.edit')->name('users.edit');
    Volt::route('/posts', 'posts.index')->name('posts.index');
    Volt::route('/posts/create', 'posts.create')->name('posts.create');
    Volt::route('/posts/{post}/edit', 'posts.edit')->name('posts.edit');
});
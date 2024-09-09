<?php

use App\Livewire\Admin\Dashboard\Dashboard;
use Illuminate\Support\Facades\Route;

Route::get('/', function() {
   return redirect()->route('dashboard');
});

Route::middleware(['auth', 'verified'])->group(function() {
    Route::get('dashboard', Dashboard::class)
        ->name('dashboard');

});

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';

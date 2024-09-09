<?php

use App\Livewire\Pages\Dashboard\Dashboard;
use App\Livewire\Pages\Tasks\TaskList;
use App\Livewire\Pages\Tasks\TaskForm;
use App\Livewire\Pages\Tasks\TaskView;
use Illuminate\Support\Facades\Route;

Route::get('/', function() {
   return redirect()->route('dashboard');
});

Route::middleware(['auth', 'verified'])->group(function() {
    Route::get('dashboard', Dashboard::class)
        ->name('dashboard');
    Route::prefix('tasks')->group(function() {
        Route::get('list', TaskList::class)->name('task_list');
        Route::get('form', TaskForm::class)->name('task_form');
        Route::get('form/{taskId}', TaskForm::class)->name('task_form_edit');
        Route::get('view/{taskId}', TaskView::class)->name('task_view');
    });
});

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';

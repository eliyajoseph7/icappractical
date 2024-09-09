<?php

namespace App\Livewire\Pages\Tasks;

use App\Models\Task;
use Livewire\Component;

class TaskView extends Component
{
    public $task;

    public function mount($taskId) {
        $this->task = Task::with(['user'])->find($taskId);
    }

    public function render()
    {
        return view('livewire.pages.tasks.task-view');
    }
}

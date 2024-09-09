<?php

namespace App\Livewire\Pages\Dashboard;

use App\Models\Task;
use Livewire\Component;

class Dashboard extends Component
{
    public $total = 0;
    public $onprogress = 0;
    public $completed = 0;

    public function mount() {
        $tasks = Task::query();

        $this->total = $tasks->count();
        $this->onprogress = (clone $tasks)->where('status', 'on-progress')->count();
        $this->completed = (clone $tasks)->where('status', 'completed')->count();
    }

    public function render()
    {
        return view('livewire.pages.dashboard.dashboard');
    }
}

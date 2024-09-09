<?php

namespace App\Livewire\Pages\Dashboard\Charts;

use App\Models\Task;
use Livewire\Component;

class TaskSummary extends Component
{
    public $data;
    public $date;
    public $loading = true;

    public function mount()
    {
        $this->date = now()->format('Y-m-d');
        $this->getData();
    }

    public function getData()
    {
        $this->loading = true;
        $query = Task::query();
        $statuses = Task::$statuses;
        $data = [];
        
        $total = number_format((clone $query)->count());
        foreach ($statuses as $status) {
            $data[] = [
                'name' => $status,
                'y' => doubleval((clone $query)->where('status', $status)->count())
            ];
        }

        $series[] = [
            'name' => 'Task',
            'colorByPoint' => true,
            'innerSize' => '70%',
            'data' => $data
        ];

        $this->dispatch('draw_task_summary_chart', series: $series, total: $total);
        // dump($series);

        $this->loading = false;
    }

    public function render()
    {
        return view('livewire.pages.dashboard.charts.task-summary');
    }
}

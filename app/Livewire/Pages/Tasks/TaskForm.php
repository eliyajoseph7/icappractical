<?php

namespace App\Livewire\Pages\Tasks;

use App\Models\Task;
use Livewire\Component;

class TaskForm extends Component
{
    public $tasks = [];

    public $action = 'add';
    public $id;

    protected $rules = [
        'tasks.*.title' => 'required|string|max:255',
        'tasks.*.description' => 'required|string',
        'tasks.*.due_date' => 'required',
    ];

    protected $messages =
    [
        'tasks.*.*.required' => 'This field is required'
    ];

    public function mount($taskId = null)
    {
        if ($taskId) {
            $this->action = 'update';
            $this->id = $taskId;
            // action is editing
            // Load existing task data
            $task = Task::find($taskId);
            $this->tasks[] = [
                'id' => $task->id,
                'title' => $task->title,
                'description' => $task->description,
                'percentage' => $task->percentage,
                'status' => $task->status,
                'due_date' => $task->due_date->format('Y-m-d'),
            ];
        } else {
            $this->addTask();
        }
    }

    public function addTask()
    {
        // $this->validate();
        $this->tasks[] = [
            'title' => '',
            'description' => '',
            'percentage' => '',
            'due_date' => '',
        ];

    }

    public function removeTask($index)
    {
        unset($this->tasks[$index]);
        $this->tasks = array_values($this->tasks);
    }


    public function submit()
    {
        $this->validate();

        foreach ($this->tasks as $taskData) {
            
            // Update existing task or create new task
            $task = Task::updateOrCreate(['id' => $taskData['id'] ?? null], [
                'title' => $taskData['title'],
                'description' => $taskData['description'],
                'percentage' => $taskData['percentage'],
                'due_date' => $taskData['due_date'],
                'status' => $this->action == 'add' ? 'pending' : $taskData['status'],
                'user_id' => auth()->user()->id
            ]);
        }

        session()->flash('info', [
            'type' => 'success',
            'message' => $this->action == 'add' ? 'Task(s) successfully created.' : 'Task successfully updated.',
        ]);

        return redirect()->route('task_list');
    }
    public function render()
    {
        $statuses = Task::$statuses;
        return view('livewire.pages.tasks.task-form', compact('statuses'));
    }
}

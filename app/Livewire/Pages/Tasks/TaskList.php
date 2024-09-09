<?php

namespace App\Livewire\Pages\Tasks;

use App\Models\Task;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class TaskList extends Component
{
    use WithPagination;
    public $search = '';
    public $perPage = 10;
    public $sortBy = 'created_at';
    public $sortDir = 'DESC';


    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function getData() {
        $data = Task::search($this->search)->orderBy($this->sortBy, $this->sortDir)->paginate($this->perPage);

        return $data;
    }

    #[On('delete_task')]
    public function deleteTask($id)
    {
        $qs = Task::find($id);
        $qs->delete();

        $this->dispatch('success', 'Record deleted successfully');
    }

    #[On('complete_task')]
    public function completeTask($id)
    {
        $qs = Task::find($id);
        $qs->status = 'completed';
        $qs->save();

        $this->dispatch('success', 'Task completed successfully');
    }

    public function sortColumn($name)
    {
        if ($this->sortBy == $name) {
            $this->sortDir = ($this->sortDir == 'ASC') ? 'DESC' : 'ASC';
            return;
        }
        $this->sortBy = $name;
        $this->sortDir = 'DESC';
    }

    public function render()
    {
        $data = $this->getData();
        
        return view('livewire.pages.tasks.task-list', compact('data'));
    }
}

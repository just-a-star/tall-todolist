<?php

namespace App\Http\Livewire\ToDo\Dashboard;

use Livewire\Component;

class ShowTaskUnfinishedToday extends Component
{
    public $tasks;

    public function mount($tasks)
    {
        $this->tasks = $tasks;
    }

    
    public function render()
    {
        return view('livewire.to-do.dashboard.show-task-unfinished-today');
    }
}

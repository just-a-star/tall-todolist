<?php

namespace App\Http\Livewire\ToDo\Dashboard;

use App\Models\Todo;
use Livewire\Component;

class ShowTaskDoneToday extends Component
{
    public Todo $todo;

    public function mount($todo)
    {
        $this->todo = $todo;
    }

    public function countTaskDoneToday()
    {
        return Todo::where('is_completed', true)->whereDate('updated_at', now())->count();
    }
    public function render()
    {
        return view('livewire.to-do.dashboard.show-task-done-today');
    }
}

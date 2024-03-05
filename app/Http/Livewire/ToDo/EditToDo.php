<?php

namespace App\Http\Livewire\ToDo;

use Livewire\Component;
use App\Models\Todo;

class EditToDo extends Component
{
    public $todo;


    public $todoId;
    public $title;
    public $description;
    public $priority;
    public $due_date;

    public function mount($todo)
    {
        // dd($todo);
        $this->todoId = $todo->id;
        $this->title = $todo->title;
        $this->description = $todo->description;
        $this->priority = $todo->priority;
        $this->due_date = $todo->due_date;
    }

    public function edit()
    {
        // dd($this->todoId);
        $this->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'priority' => 'required|integer',
            'due_date' => 'nullable|date',
        ]);

        Todo::updateOrCreate(
            ['id' => $this->todoId],
            [
                'title' => $this->title,
                'description' => $this->description,
                'priority' => $this->priority,
                'due_date' => $this->due_date,
            ]
        );

        // Notify other components to refresh their view.
        $this->emit('todoListUpdated');

        // Reset fields to empty after saving.
        $this->reset(['todoId', 'title', 'description', 'priority', 'due_date']);

    }

    public function render()
    {
        return view('livewire.to-do.edit-to-do');
    }
}

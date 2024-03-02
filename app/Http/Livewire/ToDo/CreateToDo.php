<?php

namespace App\Http\Livewire\ToDo;

use Livewire\Component;
use App\Models\Todo;

class CreateToDo extends Component
{
    public $title = '';
    public $description = '';
    public $due_date = '';

    public $priority = '';

    protected $listeners = ['updateDueDate' => 'updateDueDate', 'updatePriority' => 'updatePriority'];


    public function updateDueDate($date)
    {
        $this->due_date = $date;
    }
    public function updatePriority($priority)
    {
        $this->priority = $priority;
    }
    public function render()
    {
        return view('livewire.to-do.create-todo');
    }

    public function createToDo()
    {

        // Validation
        $this->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'priority' => 'required',
            'due_date' => 'nullable|date',
        ]);

        // Creation Logic
        Todo::create([
            'title' => $this->title,
            'description' => $this->description,
            'priority' => $this->priority,
            'due_date' => $this->due_date,
            'user_id' => auth()->user()->id,
        ]);

        //  Reset form fields

        $this->reset(['title', 'description', 'priority', 'due_date']);

        // emit event

        session()->flash('message', 'Task successfully created.');
    }
}

<?php

namespace App\Http\Livewire\ToDo;

use Livewire\Component;
use App\Models\Todo;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class CreateToDoModal extends Component
{
    public $title = '';
    public $description = '';
    public $due_date = '';

    public $priority = '';

    protected $listeners = ['updateDueDate' => 'updateDueDate', 'prioritySelected' => 'prioritySelected'];


    public function updateDueDate($date)
    {
        $this->due_date = $date;
    }
    public function prioritySelected($priority)
    {
        Log::debug("Parent Component: Received priority {$priority}");
        $this->priority = $priority;
    }
    public function render()
    {
        return view('livewire.to-do.create-to-do-modal');
    }

    public function createToDoModal()
    {
        // dd($this->title, $this->description, $this->priority, $this->due_date);

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
        $this->emit('todoListUpdated');

        session()->flash('message', 'Task successfully created.');
    }
}

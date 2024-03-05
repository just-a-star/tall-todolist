<?php

namespace App\Http\Livewire\ToDo;

use Livewire\Component;
use App\Models\Todo;
use Illuminate\Support\Facades\Auth;

class ShowToDoToday extends Component
{
    public $todoId;
    public $title;
    public $description;
    public $priority;
    public $due_date;

    protected $listeners = ['todoListUpdated' => '$refresh'];

    public function edit($id)
{
    $this->emit('editTodo', $id);
    dd($id);
}


    public function editTodo($todoId)
    {
        dd($todoId);
        $todo = Todo::findOrFail($todoId);
        $this->todoId = $todo->id;
        $this->title = $todo->title;
        $this->description = $todo->description;
        $this->priority = $todo->priority;
        $this->due_date = $todo->due_date;

        // Open the modal after loading the todo
        $this->dispatchBrowserEvent('edit-todo-modal-open');
    }

    public function markAsCompleted($id)
    {
        Todo::where('id', $id)->update(['is_completed' => true]);


        $this->emit('todoListUpdated');

    }

    public function markAsUncompleted($id)
    {
        Todo::where('id', $id)->update(['is_completed' => false]);


        $this->emit('todoListUpdated');
    }

    public function delete($id)
    {
        Todo::destroy($id);


        $this->emit('todoListUpdated');
    }

    public function getToDosForTodayProperty()
    {
        return Todo::where('user_id', Auth::id())
                   ->whereDate('due_date', today())
                   ->where('is_completed', false)
                   ->orderBy('due_date', 'asc')
                   ->get();
    }

    public function render()
    {
        return view('livewire.to-do.show-to-do-today', [
            'toDosForToday' => $this->toDosForToday
        ]);
    }


}

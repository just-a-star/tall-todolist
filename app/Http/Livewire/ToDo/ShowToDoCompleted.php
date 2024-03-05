<?php

namespace App\Http\Livewire\ToDo;

use Livewire\Component;
use App\Models\Todo;
use Illuminate\Support\Facades\Auth;

class ShowToDoCompleted extends Component
{

    protected $listeners = ['todoListUpdated' => '$refresh'];

    public function markAsUncompleted($id)
    {
        Todo::where('id', $id)->update(['is_completed' => false]);


        $this->emit('todoListUpdated');
    }

    public function render()
    {
        $completedTodos = Todo::where('user_id', Auth::id())
                              ->where('is_completed', true)
                              ->get();

        return view('livewire.to-do.show-to-do-completed', [
            'completedTodos' => $completedTodos
        ]);
    }
}

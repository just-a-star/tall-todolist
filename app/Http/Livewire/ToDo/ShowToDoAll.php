<?php

namespace App\Http\Livewire\ToDo;

use Livewire\Component;
use App\Models\Todo;
use Illuminate\Support\Facades\Auth;

class ShowToDoAll extends Component
{

    protected $listeners = ['todoListUpdated' => '$refresh'];

    public function markAsUncompleted($id)
    {
        Todo::where('id', $id)->update(['is_completed' => false]);


        $this->emit('todoListUpdated');
    }

    public function render()
    {
        $allTodos = Todo::where('user_id', Auth::id())
                              ->get();

        return view('livewire.to-do.show-to-do-all', [
            'completedTodos' => $allTodos
        ]);
    }
}

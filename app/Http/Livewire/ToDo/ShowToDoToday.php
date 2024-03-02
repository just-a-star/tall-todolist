<?php

namespace App\Http\Livewire\ToDo;

use Livewire\Component;
use App\Models\Todo;
class ShowToDoToday extends Component
{

    public function markAsCompleted($id)
    {
        // dd($id);
        $todo = Todo::find($id);
        $todo->update([
            'is_completed' => true,
        ]);

    }

    public function markAsUncompleted($id)
    {
        $todo = Todo::find($id);
        $todo->update([
            'is_completed' => false,
        ]);
    }

    public function delete($id)
    {
        $todo = Todo::find($id);
        $todo->delete();
    }

    // make function to show all the to do list for today
    public function getToDosForTodayProperty()
    {
        return Todo::where('user_id', auth()->user()->id)
               ->whereDate('due_date', today())
               ->where('is_completed', false)
               ->get();
    }

    public function render()
    {
        return view('livewire.to-do.show-to-do-today', [
            'toDosForToday' => $this->toDosForToday
        ]);
    }
}

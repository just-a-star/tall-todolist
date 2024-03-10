<?php

namespace App\Http\Livewire\ToDo;

use Livewire\Component;
use App\Models\Todo;
use Illuminate\Support\Facades\Auth;

class ShowToDoAll extends Component
{
    public $startDate;
    public $endDate;
    public $filteredTodos = [];

    protected $listeners = ['todoListUpdated' => '$refresh', 'setDates'];

    public function setDates($startDate, $endDate)
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;

        $this->filterTodos();
    }

    public function mount()
    {
        $this->filterTodos();
    }

    public function render()
    {
        $this->filterTodos(); // Ensure filtering is applied before rendering
        return view('livewire.to-do.show-to-do-all', [
            'allTodos' => $this->filteredTodos ?? [],
        ]);
    }

    public function filterTodos()
    {
        // dd($this->startDate, $this->endDate); // Debug the current filter range

        $query = Todo::where('user_id', Auth::id());

        if ($this->startDate && $this->endDate) {
            $query->whereBetween('due_date', [$this->startDate, $this->endDate]);
        }

        $this->filteredTodos = $query->get();
    }

    public function updated($propertyName)
    {
        if ($propertyName === 'startDate' || $propertyName === 'endDate') {
            $this->filterTodos();
        }
    }

    public function edit($id)
    {
        $this->emit('editTodo', $id);
        // dd($id);
    }


    public function markAsUncompleted($id)
    {
        Todo::where('id', $id)->update(['is_completed' => false]);
        $this->emitSelf('todoListUpdated');
    }

    public function markAsCompleted($id)
    {
        Todo::where('id', $id)->update(['is_completed' => true]);
        $this->emitSelf('todoListUpdated');
    }

    public function delete($id)
    {
        Todo::destroy($id);
        $this->emitSelf('todoListUpdated');
    }
}

<?php

namespace App\Http\Livewire\Components;

use App\Models\Todo;
use Livewire\Component;

class SearchToDo extends Component
{
    public Todo $todo;
    public $search = "";

    public function render()
    {
        $results = [];
        if (strlen($this->search) >= 1) {
            $results = $this->search ? Todo::where(function ($query) {
                $query->whereRaw('LOWER(title) LIKE ?', ['%' . strtolower($this->search) . '%'])
                    ->orWhereRaw('LOWER(description) LIKE ?', ['%' . strtolower($this->search) . '%']);
            })->take(5)->get() : collect([]);
        }

        return view('livewire.components.search-to-do', [
            'Todos' => $results,
        ]);
    }
}

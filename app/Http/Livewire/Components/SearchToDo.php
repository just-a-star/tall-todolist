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
        if(strlen($this->search) >= 1){
            $results = $this->search ? Todo::where(function ($query) {
                $query->where('title', 'like', '%' . $this->search . '%')
                      ->orWhere('description', 'like', '%' . $this->search . '%');
            })->get() : collect([])->limit(5);
        }

        return view('livewire.components.search-to-do', [
            'Todos' => $results,
        ]);
    }
}

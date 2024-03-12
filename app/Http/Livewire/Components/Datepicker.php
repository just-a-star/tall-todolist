<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;

class Datepicker extends Component
{
    public $due_date;

    public function mount($due_date = null)
    {
        // dd($due_date);
        $this->due_date = $due_date;
    }

    public function render()
    {
        // ddd($this->due_date); // Debug the updated due date
        return view('livewire.components.datepicker');
    }
}

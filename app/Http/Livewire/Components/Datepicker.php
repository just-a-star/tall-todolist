<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;

class Datepicker extends Component
{
    public $due_date = '';
    public function render()
    {
        return view('livewire.components.datepicker');
    }
}

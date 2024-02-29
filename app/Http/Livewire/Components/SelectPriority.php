<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;

class SelectPriority extends Component
{
    public $priority = '';
    public function setPriority($value)
    {
        $this->priority;
    }

    public function updatePriority($value)
    {
        $this->priority = $value;
    }
    public function render()
    {
        return view('livewire.components.select-priority');
    }
}

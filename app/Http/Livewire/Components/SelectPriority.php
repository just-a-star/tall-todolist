<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;
use Illuminate\Support\Facades\Log;

class SelectPriority extends Component
{
    public $priority = '';
    // public function setPriority($value)
    // {
    //     $this->priority = $value;
    //     Log::debug("Child Component: Setting priority to {$value}");
    //     $this->emitUp('prioritySelected', $this->priority);
    // }



    public function render()
    {
        return view('livewire.components.select-priority');
    }
}

<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;

class FilterDate extends Component
{
    public $startDate;
    public $endDate;

    public function render()
    {
        return view('livewire.components.filter-date');
    }

    public function updated($propertyName)
    {
        if ($propertyName === 'startDate' || $propertyName === 'endDate') {
            dd($this->startDate, $this->endDate); // Debug the updated start and end dates
        }
    }
}


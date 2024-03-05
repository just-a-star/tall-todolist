<?php

namespace App\Http\Livewire\Halaman\Todo;

use App\Models\Todo ;
use Livewire\Component;

class Edit extends Component
{
    public Todo $todo;
    public $open = false;
    public function render()
    {
        return view('livewire.halaman.todo.edit');
    }
}

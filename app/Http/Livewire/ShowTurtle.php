<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ShowTurtle extends Component
{
    public array $turtle = [];

    public function render()
    {
        return view('livewire.show-turtle');
    }
}

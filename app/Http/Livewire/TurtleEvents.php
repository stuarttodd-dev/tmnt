<?php

namespace App\Http\Livewire;

use Livewire\Component;

class TurtleEvents extends Component
{
    public array $eventLogs = [];

    public function mount(array $eventLogs)
    {
        $this->eventLogs = $eventLogs;
    }

    public function render()
    {
        return view('livewire.turtle-events');
    }
}

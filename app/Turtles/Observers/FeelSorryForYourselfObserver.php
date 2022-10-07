<?php

namespace App\Turtles\Observers;

use App\Turtles\Abstractions\ObserverAbstraction;
use App\Turtles\Contracts\TurtleContract;

class FeelSorryForYourselfObserver extends ObserverAbstraction
{
    /**
     * Do something
     */
    public function execute(): string
    {
        return 'SADNESS: I am feeling sorry for myself....';
    }

}

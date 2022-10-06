<?php

namespace App\Turtles\Actions;

use App\Turtles\Contracts\TurtleContract;
use App\Turtles\Enums\TMNT;
use App\Turtles\Factories\Turtle;
use App\Turtles\Observers\CounterAttackObserver;
use App\Turtles\Observers\FeelSorryForYourselfObserver;

class CreateDonatelloAction
{
    /**
     * Could pass in parameters here... to create a more generic action.
     *
     * @return TurtleContract
     */
    public function __invoke(): TurtleContract
    {
        return Turtle::make(TMNT::DONNIE)
            ->attach(new FeelSorryForYourselfObserver())
            ->attach(new CounterAttackObserver());
    }
}

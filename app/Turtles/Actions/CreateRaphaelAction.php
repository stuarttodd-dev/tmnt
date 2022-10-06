<?php

namespace App\Turtles\Actions;

use App\Turtles\Contracts\TurtleContract;
use App\Turtles\Enums\TMNT;
use App\Turtles\Factories\Turtle;
use App\Turtles\Observers\CounterAttackObserver;

class CreateRaphaelAction
{
    /**
     * Could pass in parameters here... to create a more generic action.
     *
     * @return TurtleContract
     */
    public function __invoke(): TurtleContract
    {
        return Turtle::make(TMNT::RAPH)
            ->attach(new CounterAttackObserver());
    }
}

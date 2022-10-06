<?php

namespace App\Turtles\Actions;

use App\Turtles\Contracts\TurtleContract;
use App\Turtles\Enums\TMNT;
use App\Turtles\Factories\Turtle;
use App\Turtles\Observers\CounterAttackObserver;

class CreateLeonardoAction
{
    /**
     * Could pass in parameters here... to create a more generic action.
     *
     * @return TurtleContract
     */
    public function __invoke(): TurtleContract
    {
        dd('here');
        return Turtle::make(TMNT::LEO)
            ->attach(new CounterAttackObserver());
    }
}

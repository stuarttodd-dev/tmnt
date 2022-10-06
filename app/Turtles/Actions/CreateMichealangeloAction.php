<?php

namespace App\Turtles\Actions;

use App\Turtles\Contracts\TurtleContract;
use App\Turtles\Enums\TMNT;
use App\Turtles\Factories\Turtle;
use App\Turtles\Observers\EatPizzaObserver;
use App\Turtles\Observers\FeelSorryForYourselfObserver;
use App\Turtles\Observers\RetreatObserver;

class CreateMichealangeloAction
{
    /**
     * Could pass in parameters here... to create a more generic action.
     *
     * @return TurtleContract
     */
    public function __invoke(): TurtleContract
    {
        return Turtle::make(TMNT::MIKEY)
            ->attach(new FeelSorryForYourselfObserver())
            ->attach(new RetreatObserver())
            ->attach(new EatPizzaObserver());
    }
}

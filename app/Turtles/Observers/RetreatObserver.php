<?php

namespace App\Turtles\Observers;

use App\Turtles\Abstractions\ObserverAbstraction;
use App\Turtles\Contracts\TurtleContract;

class RetreatObserver extends ObserverAbstraction
{
    /**
     * @param TurtleContract $turtle
     *
     * @return TurtleContract
     */
    public function transform(TurtleContract $turtle): TurtleContract
    {
        $turtle->healthPoints = 0;

        return $turtle;
    }

    /**
     * Do something
     */
    public function execute(): string
    {
        return 'RUN AWAY: Im outta here! Bye!';
    }

}

<?php

namespace App\Turtles\Observers;

use App\Turtles\Abstractions\ObserverAbstraction;
use App\Turtles\Contracts\TurtleContract;

class EatPizzaObserver extends ObserverAbstraction
{
    /**
     * @param TurtleContract $turtle
     *
     * @return TurtleContract
     */
    public function transform(TurtleContract $turtle): TurtleContract
    {
        $turtle->healthPoints += 200;

        return $turtle;
    }

    /**
     * Do something
     */
    public function execute(): string
    {
        return 'HUNGRY: Eating Pizza!';
    }

}

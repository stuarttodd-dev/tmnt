<?php

namespace App\Turtles\Abstractions;

use App\Turtles\Contracts\ObserverContract;
use App\Turtles\Contracts\TurtleContract;

/**
 * The purpose of an abstract class is to eliminate boilerplate throughout the concrete sub classes.
 */
abstract class ObserverAbstraction implements ObserverContract
{
    /**
     * @param TurtleContract $turtle
     *
     * @return TurtleContract
     */
    public function transform(TurtleContract $turtle): TurtleContract
    {
        return $turtle;
    }

    /**
     * Do something
     */
    public function execute(): string
    {
        return '';
    }
}

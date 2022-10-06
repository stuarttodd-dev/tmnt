<?php

namespace App\Turtles\Factories;

use App\Turtles\Exceptions\NotValidFactoryParameterException;
use App\Turtles\Exceptions\NotValidTurtleException;
use App\Turtles\Contracts\TurtleContract;

class Turtle
{
    public static function make(string $turtle): TurtleContract
    {
        if (! class_exists($turtle)) {
            throw new NotValidFactoryParameterException($turtle);
        }

        $turtle = new $turtle;

        if (! $turtle instanceof TurtleContract) {
            throw new NotValidTurtleException($turtle::class);
        }

        return $turtle;
    }
}



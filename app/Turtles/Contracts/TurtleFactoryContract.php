<?php

namespace App\Turtles\Contracts;

interface TurtleFactoryContract
{
    public static function make(string $turtle): TurtleContract;
}

<?php

namespace App\Turtles\Contracts;

use App\Turtles\Contracts\TurtleContract;

interface ObserverContract
{
    public function transform(TurtleContract $turtle): TurtleContract;
    public function execute(): string;
}

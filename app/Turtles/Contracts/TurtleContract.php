<?php

namespace App\Turtles\Contracts;

use Closure;

interface TurtleContract
{
    /**
     * When a turtle attacks
     */
    public function attack(): string;

    /**
     * When a turtle takes damage
     */
    public function damage(?Closure $damage = null): void;

    /**
     * @return array
     */
    public function toArray(): array;
}

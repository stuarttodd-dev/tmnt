<?php

namespace App\Turtles\Contracts;

use Closure;

interface TurtleContract
{
    /**
     * A turtles attack combo
     */
    public function attackCombo(): string;

    /**
     * When a turtle takes an attack
     */
    public function action(Closure $closure): self;

    /**
     * @param string $log
     */
    public function addEventLog(string $log): void;

    /**
     * @return array
     */
    public function toArray(): array;
}

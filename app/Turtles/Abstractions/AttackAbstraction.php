<?php

namespace App\Turtles\Abstractions;

use App\Turtles\Contracts\AttackContract;

/**
 * The Decorator accepts an instance of itself and adds to the previous decorator
 */
abstract class AttackAbstraction implements AttackContract
{
    public function __construct(public AttackContract $attack) {

    }
}

<?php

namespace App\Turtles\Attacks;

use App\Turtles\Abstractions\AttackAbstraction;

class PizzaThrowAttack extends AttackAbstraction
{
    const ATTACK = 'PiZZAAAAAAAAAA THROW! WOW!';

    public function executeAttack(): string
    {
        return $this->attack->executeAttack() . ' ' . self::ATTACK;
    }
}

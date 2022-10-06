<?php

namespace App\Turtles\Attacks;

use App\Turtles\Abstractions\AttackAbstraction;

class UppercutAttack extends AttackAbstraction
{
    const ATTACK = 'UPPER CUT!!!';

    public function executeAttack(): string
    {
        return $this->attack->executeAttack() . ' ' . self::ATTACK;
    }
}

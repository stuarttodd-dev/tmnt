<?php

namespace App\Turtles\Attacks;

use App\Turtles\Abstractions\AttackAbstraction;

class SpinAttack extends AttackAbstraction
{
    const ATTACK = 'SPIIIIINNNNNN ATTACK!!!!';

    public function executeAttack(): string
    {
        return $this->attack->executeAttack() . ' ' . self::ATTACK;
    }
}

<?php

namespace App\Turtles\Attacks;

use App\Turtles\Abstractions\AttackAbstraction;

class BoStaffHitAttack extends AttackAbstraction
{
    const ATTACK = 'BO STAFF ATTACK! OUCH!';

    public function executeAttack(): string
    {
        return $this->attack->executeAttack() . ' ' . self::ATTACK;
    }
}

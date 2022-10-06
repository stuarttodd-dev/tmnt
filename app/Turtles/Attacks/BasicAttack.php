<?php

namespace App\Turtles\Attacks;

use App\Turtles\Contracts\AttackContract;

class BasicAttack implements AttackContract
{
    const ATTACK = 'Kick!';

    public function executeAttack(): string
    {
        return self::ATTACK;
    }
}

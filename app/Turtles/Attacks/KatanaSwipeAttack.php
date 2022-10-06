<?php

namespace App\Turtles\Attacks;

use App\Turtles\Abstractions\AttackAbstraction;

class KatanaSwipeAttack extends AttackAbstraction
{
    const ATTACK = 'SWIPE! Katana attack!!!';

    public function executeAttack(): string
    {
        return $this->attack->executeAttack() . ' ' . self::ATTACK;
    }
}

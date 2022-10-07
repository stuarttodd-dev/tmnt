<?php

namespace App\Turtles\Observers;

use App\Turtles\Abstractions\ObserverAbstraction;
use App\Turtles\Attacks\BasicAttack;
use App\Turtles\Attacks\SpinAttack;

class CounterAttackObserver extends ObserverAbstraction
{
    /**
     * Do something
     */
    public function execute(): string
    {
        $attack = new BasicAttack();
        $attack = new SpinAttack($attack);

        return 'COUNTER ATTACK: ' . $attack->executeAttack();
    }

}

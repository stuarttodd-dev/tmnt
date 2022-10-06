<?php

namespace App\Turtles\Observers;

use App\Turtles\Attacks\BasicAttack;
use App\Turtles\Attacks\BoStaffHitAttack;
use App\Turtles\Attacks\SpinAttack;
use App\Turtles\Contracts\ObserverContract;

class CounterAttackObserver implements ObserverContract
{
    /**
     * Do something
     */
    public function execute(): string
    {
        $attack = new BasicAttack();
        $attack = new BoStaffHitAttack($attack);
        $attack = new SpinAttack($attack);

        return 'COUNTER ATTACK: ' . $attack->executeAttack();
    }

}

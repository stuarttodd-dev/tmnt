<?php

namespace App\Turtles\Observers;

use App\Turtles\Attacks\BasicAttack;
use App\Turtles\Attacks\BoStaffHitAttack;
use App\Turtles\Attacks\SpinAttack;
use App\Turtles\Contracts\ObserverContract;

class RetreatObserver implements ObserverContract
{
    /**
     * Do something
     */
    public function execute(): string
    {
        return 'RUN AWAY: Im outta here! Bye!';
    }

}

<?php

namespace App\Turtles;

use App\Turtles\Abstractions\TurtleAbstraction;
use App\Turtles\Attacks\BasicAttack;
use App\Turtles\Attacks\BoStaffHitAttack;
use App\Turtles\Attacks\SpinAttack;

class Donnie extends TurtleAbstraction
{
    /**
     * @var string
     */
    public string $name = 'Donatello';

    /**
     * @var string
     */
    public string $description = 'Has a way with machines!';

    /**
     * @var string
     */
    public string $avatar = 'donnie.jpeg';

    /**
     * @var int
     */
    public int $healthPoints = 100;

    /**
     * When a turtle attacks
     */
    public function attack(): string
    {
        $attack = new BasicAttack();
        $attack = new BoStaffHitAttack($attack);
        $attack = new SpinAttack($attack);

        return $attack->executeAttack();
    }

}

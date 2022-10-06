<?php

namespace App\Turtles;

use App\Turtles\Abstractions\TurtleAbstraction;
use App\Turtles\Attacks\BasicAttack;
use App\Turtles\Attacks\SpinAttack;
use App\Turtles\Attacks\UppercutAttack;

class Raph extends TurtleAbstraction
{
    /**
     * @var string
     */
    public string $name = 'Raphael';

    /**
     * @var string
     */
    public string $description = 'Cool, but rude!';

    /**
     * @var string
     */
    public string $avatar = 'raph.jpeg';

    /**
     * @var int
     */
    public int $healthPoints = 200;

    /**
     * When a turtle attacks
     */
    public function attack(): string
    {
        $attack = new BasicAttack();
        $attack = new UppercutAttack($attack);
        $attack = new SpinAttack($attack);

        return $attack->executeAttack();
    }
}

<?php

namespace App\Turtles;

use App\Turtles\Abstractions\TurtleAbstraction;
use App\Turtles\Attacks\BasicAttack;
use App\Turtles\Attacks\PizzaThrowAttack;
use App\Turtles\Attacks\UppercutAttack;

class Mikey extends TurtleAbstraction
{
    /**
     * @var string
     */
    public string $name = 'Michealangelo';

    /**
     * @var string
     */
    public string $description = 'A party dude!';

    /**
     * @var string
     */
    public string $avatar = 'mikey.jpeg';

    /**
     * @var int
     */
    public int $healthPoints = 130;

    /**
     * When a turtle attacks
     */
    public function attack(): string
    {
        $attack = new BasicAttack();
        $attack = new UppercutAttack($attack);
        $attack = new PizzaThrowAttack($attack);

        return $attack->executeAttack();
    }
}

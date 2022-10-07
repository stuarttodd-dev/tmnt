<?php

namespace App\Turtles;

use App\Turtles\Abstractions\TurtleAbstraction;
use App\Turtles\Attacks\BasicAttack;
use App\Turtles\Attacks\SpinAttack;
use App\Turtles\Attacks\UppercutAttack;

use Closure;

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
    public int $healthPoints = 900;

    /**
     * @var string
     */
    public string $classes = 'bg-danger bg-gradient';

    /**
     * A turtles attack combo
     */
    public function attackCombo(): string
    {
        $attack = new BasicAttack();
        $attack = new UppercutAttack($attack);
        $attack = new SpinAttack($attack);

        return $attack->executeAttack();
    }
}

<?php

namespace App\Turtles;

use App\Turtles\Abstractions\TurtleAbstraction;
use App\Turtles\Attacks\BasicAttack;
use App\Turtles\Attacks\KatanaSwipeAttack;
use App\Turtles\Attacks\SpinAttack;

class Leo extends TurtleAbstraction
{
    /**
     * @var string
     */
    public string $name = 'Leonardo';

    /**
     * @var string
     */
    public string $description = 'The leader in blue!';

    /**
     * @var string
     */
    public string $avatar = 'leo.jpeg';

    /**
     * @var int
     */
    public int $healthPoints = 750;

    /**
     * @var string
     */
    public string $classes = 'bg-primary bg-gradient';

    /**
     * A turtles attack combo
     */
    public function attackCombo(): string
    {
        $attack = new BasicAttack();
        $attack = new KatanaSwipeAttack($attack);
        $attack = new SpinAttack($attack);

        return $attack->executeAttack();
    }
}

<?php

namespace App\Turtles\Abstractions;

use App\Turtles\Traits\ObserverSubject;
use App\Turtles\Attacks\BasicAttack;
use App\Turtles\Contracts\TurtleContract;

use Closure;

/**
 * The purpose of an abstract class is to eliminate boilerplate throughout the concrete sub classes.
 */
abstract class TurtleAbstraction implements TurtleContract
{
    use ObserverSubject; // This transforms this class into an observer subject. (just call $this->notify() to run them).

    /**
     * @var string
     */
    public string $name = '';

    /**
     * @var string
     */
    public string $description = '';

    /**
     * @var string
     */
    public string $avatar = '';

    /**
     * @var int
     */
    public int $healthPoints = 0;

    /**
     * When a turtle attacks
     */
    public function attack(): string
    {
        return (new BasicAttack)->executeAttack();
    }

    public function damage(?Closure $damage = null): void
    {
        // Using a lambda here to manipulate the object on the fly.
        if ($damage !== null) {
            $damage($this);
        }

        // When a turtle takes damage we notify the observers.
        $this->notify();
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'description' => $this->description,
            'avatar' => $this->avatar,
            'health_points' => $this->healthPoints,
            'default_attack' => $this->attack(),
            'default_damage_reaction' =>  $this->eventLogs,
        ];
    }

}

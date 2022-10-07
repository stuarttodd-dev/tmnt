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
     * A turtles attack combo
     */
    public function attackCombo(): string
    {
        return (new BasicAttack)->executeAttack();
    }

    /**
     * @param Closure $closure
     *
     * @return $this
     */
    public function action(Closure $closure): self
    {
        return $closure($this);
    }

    /**
     * @param string $log
     */
    public function addEventLog(string $log): void
    {
        $this->eventLogs[time() . '_' . count($this->eventLogs)+1] = [
            'turtle' => $this->toArray(), // Snapshot of the turtle at the time of the event.
            'log' => $log
        ];
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
            'default_attack' => $this->attackCombo(),
            'default_damage_reaction' =>  $this->eventLogs,
        ];
    }

}

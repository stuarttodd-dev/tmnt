<?php

namespace App\Turtles\Traits;

use App\Turtles\Contracts\ObserverContract;

trait ObserverSubject
{
    /**
     * @var array
     */
    public array $observers = [];

    /**
     * @var array
     */
    public array $eventLogs = [];

    /**
     * @param ObserverContract $observer
     *
     * @return $this
     */
    public function attach(ObserverContract $observer): self
    {
        $this->observers[] = $observer;

        return $this;
    }

    /**
     * @param int $index
     *
     * @return $this
     */
    public function detach(int $index): self
    {
        unset($this->observers[$index]);

        return $this;
    }

    /**
     * Notify the observers.
     */
    public function notify(): self
    {
        $eventId = time() . rand(0, 99999);

        foreach ($this->observers as $observer) {
            $this->eventLogs[$eventId][] = $observer->execute();
        }

        return $this;
    }
}

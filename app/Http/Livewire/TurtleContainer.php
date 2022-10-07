<?php

namespace App\Http\Livewire;

use App\Turtles\Contracts\TurtleContract;
use Livewire\Component;
use Cache;

class TurtleContainer extends Component
{
    const OBSERVER_BASE_PATH = 'App\Turtles\Observers\\';
    const TURTLES = 'turtles';

    protected ?TurtleContract $turtle = null;

    public string $name = '';
    public string $description = '';
    public string $avatar = '';
    public string $classes = '';
    public int $seconds = 600;
    public string $key = '';

    public int $healthPoints = 0;

    public array $reactions = [];

    public function mount(TurtleContract $turtle)
    {
        $this->key = request()->ip() . self::TURTLES;
        $this->hydrate($turtle->name);
    }

    private function hydrate(string $turtleName, $turtles = null)
    {
        if (null === $turtles) {
            $turtles = Cache::get($this->key);
        }

        $turtle = $turtles[$turtleName];

        $this->name = $turtle->name;
        $this->description = $turtle->description;
        $this->avatar = $turtle->avatar;
        $this->classes = $turtle->classes;
        $this->healthPoints = $turtle->healthPoints;

        $this->reactions = [];
        if (!empty($turtle->observers)) {
            foreach ($turtle->observers as $observer) {
                $this->reactions[] = class_basename($observer::class);
            }
        }

        Cache::put($this->key, $turtles, $this->seconds);
    }

    public function render()
    {
        return view('livewire.turtle-container');
    }

    public function damage()
    {
        $turtles = Cache::get($this->key);
        $turtle = $turtles[$this->name];

        $turtle->action(function ($turtle) {
            $damage = rand(200, 500);
            $turtle->healthPoints -= $damage;
            $turtle->addEventLog($turtle->name . ' takes ' . $damage . ' damage!');

            if ($turtle->healthPoints <= 0 ) {
                $turtle->addEventLog($turtle->name . ' has been knocked out!');
                return $turtle;
            }

            return $turtle->notify();
        });

        $turtles[$this->name] = $turtle;
        $this->hydrate($turtle->name, $turtles);
        return redirect("/");
    }

    public function attack()
    {
        $turtles = Cache::get($this->key);
        $turtle = $turtles[$this->name];

        $turtle->action(function ($turtle) {
            $criticalHit = rand(1, 2);

            $turtle->addEventLog($turtle->name . ' executes a combo attack: ' . $turtle->attackCombo());

            if ($criticalHit === 1) {
                $hpBoost = rand(10, 100);
                $turtle->healthPoints += $hpBoost;
                $turtle->addEventLog($turtle->name . ' dealt a critical hit and gains ' . $hpBoost . ' HP as a reward!');
            }

            return $turtle;
        });

        $turtles[$this->name] = $turtle;
        $this->hydrate($turtle->name, $turtles);
        return redirect("/");
    }

    public function updateObserver(string $observer)
    {
        $turtles = Cache::get(request()->ip() . 'turtles');
        $turtle = $turtles[$this->name];

        $removed = false;
        $observerClass = self::OBSERVER_BASE_PATH . $observer;

        if (! empty($turtle->observers)) {
            foreach ($turtle->observers as $key => $observer) {
                if ($observerClass === $observer::class) {
                    $removed = true;
                    unset($turtle->observers[$key]);
                }
            }
        }

        if (! $removed) {
            $turtle->attach(new $observerClass);
        }

        $turtles[$this->name] = $turtle;
        $this->hydrate($turtle->name, $turtles);
        return redirect("/");
    }
}

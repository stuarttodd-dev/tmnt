<?php

namespace App\Turtles\Observers;

use App\Turtles\Contracts\ObserverContract;

class FeelSorryForYourselfObserver implements ObserverContract
{
    /**
     * Do something
     */
    public function execute(): string
    {
        return 'SADNESS: I am feeling sorry for myself....';
    }

}

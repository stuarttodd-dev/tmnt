<?php

namespace App\Turtles\Actions;

use Illuminate\Http\Request;
use App\Turtles\Actions\CreateLeonardoAction;
use App\Turtles\Actions\CreateRaphaelAction;
use App\Turtles\Actions\CreateDonatelloAction;
use App\Turtles\Actions\CreateMichealangeloAction;

use Cache;

class CreateTMNTAction
{
    CONST TURTLES = 'turtles';

    /**
     * @param Request $request
     * @param \App\Turtles\Actions\CreateLeonardoAction $leo
     * @param \App\Turtles\Actions\CreateRaphaelAction $raph
     * @param \App\Turtles\Actions\CreateDonatelloAction $donnie
     * @param \App\Turtles\Actions\CreateMichealangeloAction $mikey
     * @return array
     */
    public function __invoke(
        Request $request,
        CreateLeonardoAction $leo,
        CreateRaphaelAction $raph,
        CreateDonatelloAction $donnie,
        CreateMichealangeloAction $mikey
    ): array
    {
        $key = $request->ip() . self::TURTLES;
        $seconds = 600;

        $turtles = Cache::get($key);

        if (null === $turtles) {

            $leo = $leo();
            $raph = $raph();
            $donnie = $donnie();
            $mikey = $mikey();

            $turtles = [
                $leo->name => $leo,
                $raph->name => $raph,
                $donnie->name => $donnie,
                $mikey->name => $mikey,
            ];

            Cache::put($key, $turtles, $seconds);
        }

        return $turtles;
    }
}

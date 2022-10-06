<?php

namespace App\Http\Controllers;

use App\Turtles\Actions\CreateDonatelloAction;
use App\Turtles\Actions\CreateLeonardoAction;
use App\Turtles\Actions\CreateMichealangeloAction;
use App\Turtles\Actions\CreateRaphaelAction;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TurtlesController extends Controller
{
    /**
     * Extendable solution
     */
    public function good(Request $request): View
    {
        $leo = new CreateLeonardoAction();
        dd('here');
        return view('welcome', [
            'turtles' => [
                (new CreateLeonardoAction)()->notify()->toArray(),
                (new CreateRaphaelAction)()->notify()->toArray(),
                (new CreateDonatelloAction)()->notify()->toArray(),
                (new CreateMichealangeloAction)()->notify()->toArray(),
            ],
        ]);
    }

    /**
     * Code rot version
     */
    public function bad(Request $request): View
    {
        $turtles = [
            'Leo',
            'Raph',
            'Donnie',
            'Mikey',
        ];

        foreach ($turtles as $key => $turtle) {

            if ($turtle === 'Leo') {
                $turtles[$key] = [
                    'name' => 'Leonardo',
                    'health_points' => 150,
                    'description' => 'The leader in blue!',
                    'default_attack' => 'Kick! SWIPE! Katana attack!!! SPIIIIINNNNNN ATTACK!!!!',
                    'default_damage_reaction' => [
                        0 => [
                            'COUNTER ATTACK: Kick! BO STAFF ATTACK! OUCH! SPIIIIINNNNNN ATTACK!!!!',
                        ]
                    ],
                    'avatar' => 'leo.jpeg',
                ];
            }

            if ($turtle === 'Raph') {
                $turtles[$key] = [
                    'name' => 'Raphael',
                    'health_points' => 200,
                    'description' => 'Cool, but rude!',
                    'default_attack' => 'Kick! UPPER CUT!!! SPIIIIINNNNNN ATTACK!!!!',
                    'default_damage_reaction' => [
                        0 => [
                            'COUNTER ATTACK: Kick! BO STAFF ATTACK! OUCH! SPIIIIINNNNNN ATTACK!!!!',
                        ]
                    ],
                    'avatar' => 'raph.jpeg',
                ];
            }

            if ($turtle === 'Mikey') {
                $turtles[$key] = [
                    'name' => 'Michealangelo',
                    'health_points' => 130,
                    'description' => 'A party dude!',
                    'default_attack' => 'Kick! UPPER CUT!!! PiZZAAAAAAAAAA THROW! WOW!',
                    'default_damage_reaction' => [
                        0 => [
                            'SADNESS: I am feeling sorry for myself....',
                            'RUN AWAY: Im outta here! Bye!',
                            'HUNGRY: Eating Pizza!',
                        ]
                    ],
                    'avatar' => 'mikey.jpeg',
                ];
            }

            if ($turtle === 'Donnie') {
                $turtles[$key] = [
                    'name' => 'Donatello',
                    'health_points' => 100,
                    'description' => 'Has a way with machines!',
                    'default_attack' => 'Kick! BO STAFF ATTACK! OUCH! SPIIIIINNNNNN ATTACK!!!!',
                    'default_damage_reaction' => [
                        0 => [
                            'SADNESS: I am feeling sorry for myself....',
                            'COUNTER ATTACK: Kick! BO STAFF ATTACK! OUCH! SPIIIIINNNNNN ATTACK!!!!',
                        ]
                    ],
                    'avatar' => 'donnie.jpeg',
                ];
            }
        }

        return view('welcome', [
            'turtles' => $turtles,
        ]);
    }

}

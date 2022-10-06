<?php

namespace App\Turtles\Enums;

use App\Turtles\April;
use App\Turtles\Donnie;
use App\Turtles\Leo;
use App\Turtles\Mikey;
use App\Turtles\Raph;

enum TMNT: string
{
    const LEO = Leo::class;
    const MIKEY = Mikey::class;
    const RAPH = Raph::class;
    const DONNIE = Donnie::class;
    const APRIL = April::class;
}

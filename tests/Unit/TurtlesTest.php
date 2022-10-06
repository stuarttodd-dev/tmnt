<?php

namespace Tests\Unit;

use App\Turtles\Actions\CreateDonatelloAction;
use App\Turtles\Actions\CreateLeonardoAction;
use App\Turtles\Actions\CreateMichealangeloAction;
use App\Turtles\Actions\CreateRaphaelAction;
use App\Turtles\Contracts\TurtleContract;
use App\Turtles\Exceptions\NotValidFactoryParameterException;
use App\Turtles\Exceptions\NotValidTurtleException;
use App\Turtles\Observers\CounterAttackObserver;
use App\Turtles\Observers\EatPizzaObserver;
use App\Turtles\Observers\FeelSorryForYourselfObserver;
use App\Turtles\Observers\RetreatObserver;
use PHPUnit\Framework\TestCase;

use App\Turtles\Factories\Turtle;
use App\Turtles\Enums\TMNT;

class Turtles extends TestCase
{
    /**
     * @test
     *
     */
    public function throw_exception_on_factory_if_not_valid_turtle()
    {
        // If class doesn't implement TurtleContract throw this exception
        $this->expectException(NotValidTurtleException::class);
        Turtle::make(TMNT::APRIL);
    }

    /**
     * @test
     */
    public function throw_exception_on_factory_if_not_valid_string()
    {
        // If parameter isn't a reference to a class, throw exception
        $this->expectException(NotValidFactoryParameterException::class);
        Turtle::make('Some stuff');
    }

    /**
     * @test
     */
    public function can_create_turtle_objects_via_factory()
    {
        // Examples of creating Turtle objects
        $leo = Turtle::make(TMNT::LEO);
        $raph = Turtle::make(TMNT::RAPH);
        $donnie = Turtle::make(TMNT::DONNIE);
        $mikey = Turtle::make(TMNT::MIKEY);

        $this->assertTrue($leo instanceof TurtleContract);
        $this->assertTrue($raph instanceof TurtleContract);
        $this->assertTrue($donnie instanceof TurtleContract);
        $this->assertTrue($mikey instanceof TurtleContract);
    }

    /**
     * @test
     */
    public function turtles_can_carry_out_an_attack()
    {
        // Turtles carrying out attacks
        $leoAttack = Turtle::make(TMNT::LEO)->attack();
        $raphAttack = Turtle::make(TMNT::RAPH)->attack();
        $donnieAttack = Turtle::make(TMNT::DONNIE)->attack();
        $mikeyAttack = Turtle::make(TMNT::MIKEY)->attack();

        // An example of a 'brittle' test, ideally we need to reference the action constants.
        $this->assertStringContainsString('Kick! SWIPE! Katana attack!!! SPIIIIINNNNNN ATTACK!!!!', $leoAttack);
        $this->assertStringContainsString('Kick! UPPER CUT!!! SPIIIIINNNNNN ATTACK!!!!', $raphAttack);
        $this->assertStringContainsString('Kick! BO STAFF ATTACK! OUCH! SPIIIIINNNNNN ATTACK!!!!', $donnieAttack);
        $this->assertStringContainsString('Kick! UPPER CUT!!! PiZZAAAAAAAAAA THROW! WOW!', $mikeyAttack);
    }

    /**
     * @test
     */
    public function turtles_can_take_damage_via_lambda_function()
    {
        // Examples of Lambdas (anonymous function) adjusting the turtle objects.
        $mikey = Turtle::make(TMNT::MIKEY);
        $leo = Turtle::make(TMNT::LEO);

        $mikeyDamage = 95;
        $mikeyHPBefore = $mikey->healthPoints;
        $mikey->damage(function ($turtle) use ($mikeyDamage) {
            $turtle->healthPoints -= $mikeyDamage;
            // Potentially do other stuff here...
            return $turtle;
        });
        $mikeyHPAfter = $mikey->healthPoints;

        $leoDamage = 70;
        $leoHPBefore = $leo->healthPoints;
        $leo->damage(function ($turtle) use ($leoDamage) {
            $turtle->healthPoints -= $leoDamage;
            // Potentially do other stuff here...
            return $turtle;
        });
        $leoHPAfter = $leo->healthPoints;

        $this->assertTrue($mikeyHPAfter === ($mikeyHPBefore - $mikeyDamage));
        $this->assertTrue($leoHPAfter === ($leoHPBefore - $leoDamage));
    }

    /**
     * @test
     */
    public function observers_run_when_turtle_takes_damage()
    {
        // Raph is going to take 100 damage and counter attack
        // If Raph is attacked again, he's going to retreat.

        $raph = Turtle::make(TMNT::RAPH);

        $raph->attach(new CounterAttackObserver()); // could write unit tests here but its type-hinted anyway.
        $raph->damage(function($turtle) {
            $turtle->healthPoints -= 100;
            return $turtle;
        });

        $this->assertCount(1, $raph->observers);
        $this->assertCount(1, $raph->eventLogs);

        // Now lets detach it.
        $raph->detach(0);
        $this->assertCount(0, $raph->observers);

        // Attach retreat
        $raph->attach(new RetreatObserver());
        $this->assertCount(1, $raph->observers);

        // Take damage
        $raph->damage(function($turtle) {
            $turtle->healthPoints -= 50;
            // You could attach / detach observers here potentially.
            return $turtle;
        });

        $this->assertCount(2, $raph->eventLogs);

        // Mikey is going to take 50 damage, feel sorry for himself, retreat and eat pizza.
        $mikey = Turtle::make(TMNT::MIKEY);
        $mikey
            ->attach(new FeelSorryForYourselfObserver())
            ->attach(new RetreatObserver())
            ->attach(new EatPizzaObserver());

        $this->assertCount(3, $mikey->observers);

        $mikey->damage(function($turtle) {
            $turtle->healthPoints -= 50;
            return $turtle;
        });

        $this->assertCount(1, $mikey->eventLogs);
    }

    /**
     * @test
     */
    public function can_defer_to_action_objects()
    {
        // Specify at run-time can be logic heavy... especially in controllers
        // Action objects make stuff simplified and accessible throughout the app.

        $donnie = (new CreateDonatelloAction)();
        $mikey = (new CreateMichealangeloAction())();
        $leo = (new CreateLeonardoAction())();
        $raph = (new CreateRaphaelAction())();

        $this->assertTrue($leo instanceof TurtleContract);
        $this->assertTrue($raph instanceof TurtleContract);
        $this->assertTrue($donnie instanceof TurtleContract);
        $this->assertTrue($mikey instanceof TurtleContract);
    }
}

<?php

namespace App\Turtles\Exceptions;

use Exception;

/**
 * NotValidTurtleException
 */
class NotValidTurtleException extends Exception
{
    public function __construct($name, $code = 0, Exception $previous = null)
    {
        $message = get_class($this) . ': ' . ucwords($name) . ' Turtle is invalid, it must implement the TurtleContract.';
        parent::__construct($message, $code, $previous);
    }
}

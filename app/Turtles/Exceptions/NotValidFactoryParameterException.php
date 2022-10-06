<?php

namespace App\Turtles\Exceptions;

use Exception;

/**
 * NotValidFactoryParameterException
 */
class NotValidFactoryParameterException extends Exception
{
    public function __construct($name, $code = 0, Exception $previous = null)
    {
        $message = get_class($this) . ': ' . ucwords($name) . ' parameter is invalid, it must string which refers to a class which implements the TurtleContract.';
        parent::__construct($message, $code, $previous);
    }
}

<?php

namespace app\Modelo\Exceptions;


class ParametrosDePersonaIncorrectosException extends \Exception
{
    public function __construct(string $message = "", int $code = 0, ?Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
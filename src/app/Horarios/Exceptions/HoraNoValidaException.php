<?php

namespace app\Horarios\Exceptions;

class HoraNoValidaException extends \Exception
{

    public function __construct(string $message,int $code, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

}
<?php

namespace App\Exceptions\Api\Guest;

class InvalidGuestId extends \Exception
{
    public function __construct(string $message = "Гость не найден", int $code = 400, ?Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}

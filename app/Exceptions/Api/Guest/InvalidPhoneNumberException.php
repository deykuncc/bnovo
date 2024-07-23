<?php

namespace App\Exceptions\Api\Guest;

class InvalidPhoneNumberException extends \Exception
{
    public function __construct(string $message = "Неправильный номер телефона", int $code = 400, ?Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}

<?php

namespace App\Exceptions;

use Exception;

use function PHPUnit\Framework\isEmpty;

class AuthFailedException extends Exception
{
    public function __construct($message = null)
    {
        parent::__construct($message ?? 'Wrong credentials');
    }
}

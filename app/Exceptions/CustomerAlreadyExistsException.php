<?php

namespace App\Exceptions;

use Exception;

class CustomerAlreadyExistsException extends Exception
{
    public function __construct($document = null)
    {
        $message = $document ? "Ja existe um cliente cadastrado com o documento: ".$document." !" : " Ja existe um cadastrado para esse cliente";
        parent::__construct($message);
    }
}

<?php

namespace JakubTheDeveloper\MusicalScales\Exception;

class InvalidKeyException extends \Exception
{
    public function __construct(string $key)
    {
        parent::__construct("Key \"{$key}\" is invalid.");
    }
}
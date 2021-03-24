<?php

namespace JakubTheDeveloper\MusicalScales\Exception;

class ScaleNotFoundException extends \Exception
{
    public function __construct(string $scaleName)
    {
        parent::__construct("Scale \"{$scaleName}\" not found.");
    }
}
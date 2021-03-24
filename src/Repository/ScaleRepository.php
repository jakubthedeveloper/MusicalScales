<?php

namespace JakubTheDeveloper\MusicalScales\Repository;

use JakubTheDeveloper\MusicalScales\Data\KeySteps;
use JakubTheDeveloper\MusicalScales\Data\Scales;

class ScaleRepository
{
    public function findScales(string $searchString): array
    {
        return array_values(array_filter(array_keys(Scales::SCALES), function ($value) use ($searchString) {
            return strpos($value, $searchString) !== false;
        }));
    }

    public function getSteps(string $scaleName, string $key, bool $useHInstedOfB = false): array
    {
        if (array_key_exists($scaleName, Scales::SCALES) === false) {
            throw new \Exception("Scale not found"); // TODO: exception class + test
        }

        if (array_key_exists($key, KeySteps::KEY_STEPS) === false) {
            throw new \Exception("Invalid key"); // TODO: exception class + test
        }

        $result = [];

        foreach (str_split(Scales::SCALES[$scaleName]) as $step => $value) {
            if ((int)$value === 1) {
                $note = KeySteps::KEY_STEPS[$key][$step];

                if ($useHInstedOfB === true && $note === 'B') {
                    $note = 'H';
                }

                $result[] = $note;
            }
        }

        return $result;
    }
}

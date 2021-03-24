<?php

namespace JakubTheDeveloper\MusicalScales\Repository;

use JakubTheDeveloper\MusicalScales\Data\KeyNotes;
use JakubTheDeveloper\MusicalScales\Data\Scales;

class ScaleRepository
{
    public function findScales(string $searchString): array
    {
        return array_values(array_filter(array_keys(Scales::SCALES), function ($value) use ($searchString) {
            return strpos($value, $searchString) !== false;
        }));
    }

    public function getNotes(string $scaleName, string $key, bool $useHInstedOfB = false): array
    {
        // TODO: refactor
        if (array_key_exists($scaleName, Scales::SCALES) === false) {
            throw new \Exception("Scale not found"); // TODO: exception class + test
        }

        if (array_key_exists($key, KeyNotes::NOTES) === false) {
            throw new \Exception("Invalid key"); // TODO: exception class + test
        }

        $result = [];

        foreach (str_split(Scales::SCALES[$scaleName]) as $step => $value) {
            if ((int)$value === 1) {
                $note = KeyNotes::NOTES[$key][$step];

                if ($useHInstedOfB === true && $note === 'B') {
                    $note = 'H';
                }

                $result[] = $note;
            }
        }

        return $result;
    }
}

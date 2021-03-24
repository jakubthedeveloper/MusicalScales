<?php

namespace JakubTheDeveloper\MusicalScales\Repository;

use JakubTheDeveloper\MusicalScales\Data\KeyNotes;
use JakubTheDeveloper\MusicalScales\Data\Scales;
use JakubTheDeveloper\MusicalScales\Exception\InvalidKeyException;
use JakubTheDeveloper\MusicalScales\Exception\ScaleNotFoundException;

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
        $this->validateScale($scaleName);
        $this->validateKey($key);

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

    private function validateScale(string $scaleName): void
    {
        if (array_key_exists($scaleName, Scales::SCALES) === false) {
            throw new ScaleNotFoundException($scaleName);
        }
    }

    private function validateKey(string $key): void
    {
        if (array_key_exists($key, KeyNotes::NOTES) === false) {
            throw new InvalidKeyException($key);
        }
    }
}

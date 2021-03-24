<?php

namespace JakubTheDeveloper\MusicalScales;

use JakubTheDeveloper\MusicalScales\Repository\ScaleRepository;

class MusicalScales
{
    private ScaleRepository $scaleRepository;

    public function __construct()
    {
        $this->scaleRepository = new ScaleRepository();
    }

    public function findScales(string $searchString): array
    {
        return $this->scaleRepository->findScales($searchString);
    }

    public function getSteps(string $scaleName, string $key = 'C'): array
    {
        return $this->scaleRepository->getSteps($scaleName, $key);
    }
}
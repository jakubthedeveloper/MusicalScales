<?php

namespace JakubTheDeveloper\MusicalScales;

use JakubTheDeveloper\MusicalScales\Repository\ScaleRepository;

class MusicalScales
{
    private static $instance = null;
    private bool $useHInsteadOfB = false;

    private ScaleRepository $scaleRepository;

    public function __construct()
    {
        $this->scaleRepository = new ScaleRepository();
    }

    public static function getInstance(): self
    {
        if (self::$instance === null) {
            self::$instance = new self;
        }

        return self::$instance;
    }

    public function findScales(string $searchString): array
    {
        return $this->scaleRepository->findScales($searchString);
    }

    public function getSteps(string $scaleName, string $key): array
    {
        return $this->scaleRepository->getSteps($scaleName, $key, $this->useHInsteadOfB);
    }

    public function useHInsteadOfB(bool $value = true): void
    {
        $this->useHInsteadOfB = $value;
    }
}
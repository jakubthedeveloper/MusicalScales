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

    public function getNotes(string $scaleName, string $key): array
    {
        if ($key === 'H') {
            $key = 'B';
        }

        return $this->scaleRepository->getNotes($scaleName, $key, $this->useHInsteadOfB);
    }

    public function useHInsteadOfB(bool $value = true): void
    {
        $this->useHInsteadOfB = $value;
    }
}
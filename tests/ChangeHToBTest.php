<?php
declare(strict_types=1);

use JakubTheDeveloper\MusicalScales\MusicalScales;
use PHPUnit\Framework\TestCase;

final class ChangeHToBTest extends TestCase
{
    private MusicalScales $musicalScales;

    public function setUp(): void
    {
        $this->musicalScales = MusicalScales::getInstance();
    }

    public function testChangeHToB(): void
    {
        $searchResults = $this->musicalScales->getNotes('Ionian, Major', 'G');
        $this->assertEquals(['G', 'A', 'B', 'C', 'D' ,'E', 'F#'], $searchResults);

        $this->musicalScales->useHInsteadOfB();
        $searchResults = $this->musicalScales->getNotes('Ionian, Major', 'G');
        $this->assertEquals(['G', 'A', 'H', 'C', 'D' ,'E', 'F#'], $searchResults);

        $this->musicalScales->useHInsteadOfB(false);
        $searchResults = $this->musicalScales->getNotes('Ionian, Major', 'G');
        $this->assertEquals(['G', 'A', 'B', 'C', 'D' ,'E', 'F#'], $searchResults);
    }
}
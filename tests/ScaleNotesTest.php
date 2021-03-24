<?php
declare(strict_types=1);

use JakubTheDeveloper\MusicalScales\MusicalScales;
use PHPUnit\Framework\TestCase;

final class ScaleNotesTest extends TestCase
{
    private MusicalScales $musicalScales;

    public function setUp(): void
    {
        $this->musicalScales = MusicalScales::getInstance();
    }

    /**
     * @dataProvider notesData
     */
    public function testGetNotes(string $scaleName, string $key, array $expectedSteps): void
    {
        $resultSteps = $this->musicalScales->getNotes($scaleName, $key);

        $this->assertEquals($expectedSteps, $resultSteps);
    }

    public function notesData(): array
    {
        return [
            [
                'Dominant Pentatonic',
                'C',
                ['C', 'D', 'E', 'G', 'A#']
            ],
            [
                'Lydian Diminished',
                'A#',
                ['A#', 'C', 'C#', 'E', 'F', 'G', 'A']
            ],
            [
                'Leading Whole-Tone',
                'G',
                ['G', 'A', 'B', 'C#', 'D#', 'F', 'F#']
            ],
            [
                'Chromatic Bebop',
                'E',
                ['E', 'F', 'F#', 'G#', 'A', 'B', 'C#', 'D', 'D#']
            ]
        ];
    }
}

<?php
declare(strict_types=1);

use JakubTheDeveloper\MusicalScales\MusicalScales;
use PHPUnit\Framework\TestCase;

final class ScaleStepsTest extends TestCase
{
    private MusicalScales $musicalScales;

    public function setUp(): void
    {
        $this->musicalScales = new MusicalScales;
    }

    /**
     * @dataProvider stepsData
     */
    public function testGetSteps(string $scaleName, string $key, array $expectedSteps): void
    {
        // TODO: option to change B to H

        $resultSteps = $this->musicalScales->getSteps($scaleName, $key);

        $this->assertEquals($expectedSteps, $resultSteps);
    }

    public function stepsData(): array
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
            ]
            // TODO: more tests cases
        ];
    }
}

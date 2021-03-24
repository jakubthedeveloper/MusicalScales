<?php
declare(strict_types=1);

use JakubTheDeveloper\MusicalScales\MusicalScales;
use PHPUnit\Framework\TestCase;

final class ScaleSearchTest extends TestCase
{
    private MusicalScales $musicalScales;

    public function setUp(): void
    {
        $this->musicalScales = new MusicalScales;
    }

    /**
     * @dataProvider findScalesData
     */
    public function testFindScales(string $searchString, array $expectedResults): void
    {
        $searchResults = $this->musicalScales->findScales($searchString);

        $this->assertEquals($expectedResults, $searchResults);
    }

    public function findScalesData(): array
    {
        return [
            [
                "Raga Rage",
                [
                    "Raga Rageshri, Nattaikurinji (India)",
                    "Raga Ragesri (India)"
                ]
            ],

            [
                "Locrian",
                [
                    "Locrian  - B to A Ascending naturals",
                    "Locrian 2",
                    "Locrian Natural Maj 6, Pseudo Turkish",
                    "Locrian PentaMirror",
                    "Locrian bb7",
                    "Major Locrian",
                    "Minor Locrian, Hindi 3 flats and bV",
                    "Phrygian Locrian ( same as 7/0/7 in 12 edo)",
                    "Phrygian Locrian (All b’s) - 11/891011/6 in 12edo)",
                    "Super Locrian all sharps",
                    "Ultra Locrian"
                ]
            ]
            //TODO: more test cases
        ];
    }
}

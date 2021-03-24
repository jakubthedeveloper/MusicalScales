<?php
declare(strict_types=1);

use JakubTheDeveloper\MusicalScales\Exception\InvalidKeyException;
use JakubTheDeveloper\MusicalScales\Exception\ScaleNotFoundException;
use JakubTheDeveloper\MusicalScales\MusicalScales;
use PHPUnit\Framework\TestCase;

final class ExceptionsTest extends TestCase
{
    private MusicalScales $musicalScales;

    public function setUp(): void
    {
        $this->musicalScales = MusicalScales::getInstance();
    }

    /**
     * @dataProvider invalidKeysDataProvider
     */
    public function testInvalidKeyException(string $key)
    {
        $this->expectException(InvalidKeyException::class);
        $this->expectDeprecationMessage("Key \"{$key}\" is invalid.");
        $this->musicalScales->getNotes("Chromatic Hypodorian", $key);
    }

    public function invalidKeysDataProvider(): array
    {
        return [
            ['S'],
            ['not a key'],
            ['7'],
            ['']
        ];
    }

    /**
     * @dataProvider invalidScaleDataProvider
     */
    public function testScaleNotFoundException(string $scaleName)
    {
        $this->expectException(ScaleNotFoundException::class);
        $this->expectDeprecationMessage("Scale \"{$scaleName}\" not found.");
        $this->musicalScales->getNotes($scaleName, 'B');
    }

    public function invalidScaleDataProvider(): array
    {
        return [
            ['Majorrr'],
            ['What?'],
            ['Punk Rock Chromatic'],
            ['Not a scale']
        ];
    }
}
# Musical Scales

🎶 PHP / Composer library to find notes of various musical scales in any key.

[![Build Status](https://travis-ci.org/jakubthedeveloper/MusicalScales.svg?branch=master)](https://travis-ci.org/jakubthedeveloper/MusicalScales)

## Installation

```shell script
composer require jakub-the-developer/musical-scales
```

## Usage

### Find scale names

```php
use JakubTheDeveloper\MusicalScales\MusicalScales;

$musicalScales = MusicalScales::getInstance();

$musicalScales->findScales("Bebop");
// Result:
// [
//     "Chromatic Bebop",
//     "Dominant Bebop",
//     "Half-Diminished Bebop",
//     "Major Bebop",
//     "Major Bebop Heptatonic Mela Mararanjani (India)",
//     "Major Bebop Hexatonic",
//     "Minor Bebop (As Minor Bebop 11/891011/3 in 12edo)",
//     "Minor Bebop (all b’s) 11/2891011/3 in 12edo)",
//     "Minor Bebop (as 7/0/4 in 12 edo)",
//     "Minor Bebop Heptatonic (as 7/3/4 in 12edo)"
// ]
```

### Get list of notes in specified scale and key

```php
use JakubTheDeveloper\MusicalScales\MusicalScales;

$musicalScales = MusicalScales::getInstance();

$musicalScales->getSteps("Dominant Pentatonic", "C"); 
// Result: ['C', 'D', 'E', 'G', 'A#']

$musicalScales->getSteps("Lydian Diminished", "A#"); 
// Result: ['A#', 'C', 'C#', 'E', 'F', 'G', 'A']
```

### Use H instead of B

In some countries note B is written as H, you can easily switch to this format.

```php
use JakubTheDeveloper\MusicalScales\MusicalScales;

$musicalScales = MusicalScales::getInstance();

$musicalScales->getSteps('Ionian, Major', 'G');
// Result: ['G', 'A', 'B', 'C', 'D' ,'E', 'F#']

$musicalScales->useHInsteadOfB();
$musicalScales->getSteps('Ionian, Major', 'G');
// Result: ['G', 'A', 'H', 'C', 'D' ,'E', 'F#']

$musicalScales->useHInsteadOfB(false);
$musicalScales->getSteps('Ionian, Major', 'G');
// Result: ['G', 'A', 'B', 'C', 'D' ,'E', 'F#']
```

## Buy me a coffee
Do you appreciate my work?
[Buy me a coffee](https://buymeacoff.ee/JakubDeveloper)

## Keywords
Music scales, musical scales, piano scales, guitar scales.
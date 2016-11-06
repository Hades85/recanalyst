<?php

/**
 * A very barebones example. It outputs a map image to a PNG file and
 * outputs the players in the game to the command line.
 */

require __DIR__ . '/../vendor/autoload.php';

use RecAnalyst\RecordedGame;

$filename = __DIR__ . '/../test/recs/forgotten/HD-FE.mgx2';

// Read a recorded game from a file path.
$rec = new RecordedGame($filename);

// Render a map image. Map images are instances of the \Intervention\Image
// library, so you can easily manipulate them.
$rec->mapImage()
    ->resize(240, 120)
    ->save('minimap.png');

// Display players and their civilizations.
echo 'Players: ' . "\n";
foreach ($rec->players() as $player) {
    echo ' * ' . $player->name . ' (' . $player->civName(). ')' . "\n";
}

echo 'Minimap saved in minimap.png.' . "\n";
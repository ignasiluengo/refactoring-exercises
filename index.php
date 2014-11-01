<?php

use Qustodio\Domain\Entity\Customer;
use Qustodio\Domain\Entity\Movie;
use Qustodio\Domain\Entity\Rental;

require_once __DIR__ . '/vendor/autoload.php';

$movies = [
    'avengers' => new Movie('The avengers', 1),
    'war_z' => new Movie('World War Z', 0),
    'aladin' => new Movie('Aladin', 2),
];

$juan = new Customer('Juan');

$juan->addRental(new Rental($movies['avengers'], 1));
$juan->addRental(new Rental($movies['aladin'], 3));

echo $juan->statement() . PHP_EOL;
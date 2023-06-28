<?php
include 'Fogli.php';
include 'Collezione.php';
$foglio1 = new Foglio('data/dati_14_5_2023.csv');
$foglio2 = new Foglio('data/dati_15_5_2023.csv');
$foglio3 = new Foglio('data/dati_14_5_2023.csv');
$foglio4 = new Foglio('data/dati_14_5_2023.csv');



$collezione = new Collezione();
$collezione->aggiungiFoglio($foglio1);
$collezione->aggiungiFoglio($foglio2);
$collezione->aggiungiFoglio($foglio3);
$collezione->aggiungiFoglio($foglio4);

$mediafogli = $collezione->mediaTuttiFogli();

echo "Media di tutti i fogli: " . $mediafogli;

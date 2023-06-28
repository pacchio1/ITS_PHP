<?php
$file = fopen('dati.csv', 'r');
$file2 = fopen('output2.csv', 'w');
$data = array();
$output = array();
while (($row = fgetcsv($file)) !== false) {
    $med = array_sum($row) / count($row);
    $output = number_format($med, 4, '.', '');
    fwrite($file2, $output . PHP_EOL);
}
fclose($file);
fclose($file2);

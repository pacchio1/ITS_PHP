<?php
$file = fopen('dati.csv', 'r');
$data = array();
while (($row = fgetcsv($file)) !== false) {
    $data[] = $row;
}
fclose($file);

$output = array();
foreach ($data as $row) {
    $med = array_sum($row) / count($row);
    $output[] = number_format($med, 4, '.', '');
}

$file = fopen('output.csv', 'w');
foreach ($output as $row) {
    fputcsv($file, array($row));
}
fclose($file);

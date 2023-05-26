<?php
/*$a = 32;
$b = sprintf('%b, %o, %x', $a, $a, $a);
echo $b;*/
/*
$matrix = [
    [1, 2, 3],
    [4, 5, 6],
];
$matrix2 = [
    [$matrix[0][0], $matrix[1][0]],
    [$matrix[0][1], $matrix[1][1]],
    [$matrix[0][2], $matrix[1][2]],

];
print_r($matrix2);
*/
$cf = 'PCCMRC02S09L219C';
//$cf = 'AAABBB00Y01S100D';
$nc = substr($cf, 0, 6);
$yy = substr($cf, 6, 2);
$m = substr($cf, 8, 1);
$g = substr($cf, 9, 2);
$cc = substr($cf, 15, 1);

$valDisp = array("0" => "1", "1" => "0", "2" => "5", "3" => "7", "4" => "9", "5" => "13", "6" => "15", "7" => "17", "8" => "19", "9" => "21", "A" => "1", "B" => "0", "C" => "5", "D" => "7", "E" => "9", "F" => "13", "G" => "15", "H" => "17", "I" => "19", "J" => "21", "K" => "2", "L" => "4", "M" => "18", "N" => "20", "O" => "11", "P" => "3", "Q" => "6", "R" => "8", "S" => "12", "T" => "14", "U" => "16", "V" => "10", "W" => "22", "X" => "25", "Y" => "24", "Z" => "23");
$valPar = array("0" => "0", "1" => "1", "2" => "2", "3" => "3", "4" => "4", "5" => "5", "6" => "6", "7" => "7", "8" => "8", "9" => "9", "A" => "0", "B" => "1", "C" => "2", "D" => "3", "E" => "4", "F" => "5", "G" => "6", "H" => "7", "I" => "8", "J" => "9", "K" => "10", "L" => "11", "M" => "12", "N" => "13", "O" => "14", "P" => "15", "Q" => "16", "R" => "17", "S" => "18", "T" => "19", "U" => "20", "V" => "21", "W" => "22", "X" => "23", "Y" => "24", "Z" => "25");
$valresto = array("A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z");




$total = $valDisp[substr($cf, 0, 1)] +
    $valDisp[substr($cf, 0, 1)] +
    $valDisp[substr($cf, 1, 1)] +
    $valDisp[substr($cf, 2, 1)] +
    $valDisp[substr($cf, 3, 1)] +
    $valDisp[substr($cf, 4, 1)] +
    $valDisp[substr($cf, 5, 1)] +
    $valDisp[substr($cf, 6, 1)] +
    $valDisp[substr($cf, 7, 1)] +
    $valDisp[substr($cf, 8, 1)] +
    $valDisp[substr($cf, 9, 1)] +
    $valDisp[substr($cf, 10, 1)] +
    $valDisp[substr($cf, 11, 1)] +
    $valDisp[substr($cf, 12, 1)] +
    $valDisp[substr($cf, 13, 1)];

$resto = $total % 26;
$ccc = $valresto[$resto];



if (strlen($cf) !== 16) {
    echo ("codice fiscale non valido");
} //piu lungo di 16 caratteri
if (!preg_match('/^[a-zA-Z0-9]+$/', $cf)) {
    echo ("codice fiscale non valido");
} //espressione regolare
echo $ccc . " " . $cc . "\n";
if ($ccc !== $cc) {
    echo ("codice fiscale non valido");
} //codice caratere controllo
else {
    echo ("codice fiscale valido");
}

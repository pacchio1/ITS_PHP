<?php
//1--------------------------------------------------------
$a = 0;
$b = 1;
echo "$a\n$b\n";
$i = 0;
while ($i <= 80) {
	$next = bcadd($a, $b);
	echo "$next" . "\n";
	$a = $b;
	$b = $next;
	$i++;
}
do {
	$next = bcadd($a, $b);
	echo "$next" . "\n";
	$a = $b;
	$b = $next;
	$i++;
} while ($i <= 80);

//2--------------------------------------------------------
function hello(string $name): string
{
	$h = date('h');
	if ($h >= 5 or $h <= 13)
		return sprintf("Buon giorno %s", $name);
	if ($h >= 13 or $h <= 17)
		return sprintf("Buon pomeriggio %s", $name);
	if ($h >= 17 or $h <= 23)
		return sprintf("Buon sera %s", $name);
	else
		return sprintf("Buon notte %s", $name);
}
echo hello('Alberto');

//3--------------------------------------------------------
function mediaVoti(array $voti): int
{
	return array_sum($voti) / sizeof($voti);
}

$voti = [28, 24, 25.20, 28, 26, 22, 29, 26, 25, 19];
echo mediaVoti($voti);

for ($i = 1; $i <= 100; $i++) {
	if (!($i % 5 == 0 && $i % 3 == 0))
		echo ($i . " ");
	if ($i % 3 == 0)
		echo ("Fizz");
	if ($i % 5 == 0)
		echo ("Buzz");
	echo ("\n");
}

//4--------------------------------------------------------
function quickSort($array)
{
	if (count($array) < 2) {
		return $array;
	}
	//punto a caso partenza
	$pivot = $array[0];
	//sinistra e destra del punto creato
	$left = [];
	$right = [];
	//ordinamento
	for ($i = 1; $i < count($array); $i++) {
		if ($array[$i] < $pivot) {
			$left[] = $array[$i];
		} else {
			$right[] = $array[$i];
		}
	}
	//ricorsività
	return array_merge(quickSort($left), array($pivot), quickSort($right));
}
$tmp = quicksort($voti);
print_r($tmp);

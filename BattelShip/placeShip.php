<?php
include 'boat.php';

function inizializePersonalBoard()
{
    for ($i = 0; $i < 10; $i++) {
        for ($j = 0; $j < 10; $j++) {
            $personalBoard[$i][$j] = 0;
        }
    }
    return $personalBoard;
}
//creo le navi
$destroyer = new boat("destroyer", 2);
$submarine = new boat("submarine", 3);
$cruiser = new boat("cruiser", 3);
$battleship = new boat("battleship", 4);
$carrier = new boat("carrier", 5);

//inizializo le navi che mi servono
$l4   = $battleship;
$l3_1 = $carrier;
$l3_2 = $carrier;
$l2_1 = $destroyer;
$l2_2 = $destroyer;
$l2_3 = $destroyer;


$personalBoard = inizializePersonalBoard();

// input del utente
//l4 = 1 | l3_1 =2 | l3_2 = 3 | l2_1 = 4 | l2_2 = 5 | l2_3 = 6
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

</body>

</html>

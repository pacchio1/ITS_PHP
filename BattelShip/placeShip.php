<?php
include 'class/Boat.php';

function initializePersonalBoard()
{
    for ($i = 0; $i < 10; $i++) {
        for ($j = 0; $j < 10; $j++) {
            $personalBoard[$i][$j] = 0;
        }
    }
    return $personalBoard;
}
//creo le navi
$personalBoard = initializePersonalBoard();

// input del utente
$incrociatore = new Incrociatore();
$incrociatore->posiziona($_POST['x'], $_POST['y'], $_POST['direzione']);

$sottomarino1 = new Sottomarino();
$incrociatore->posiziona($_POST['x'], $_POST['y'], $_POST['direzione']);

$sottomarino2 = new Sottomarino();
$incrociatore->posiziona($_POST['x'], $_POST['y'], $_POST['direzione']);

$cacciatorpediniere1 = new Cacciatorpediniere();
$incrociatore->posiziona($_POST['x'], $_POST['y'], $_POST['direzione']);

$cacciatorpediniere2 = new Cacciatorpediniere();
$incrociatore->posiziona($_POST['x'], $_POST['y'], $_POST['direzione']);

$cacciatorpediniere3 = new Cacciatorpediniere();
$incrociatore->posiziona($_POST['x'], $_POST['y'], $_POST['direzione']);



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Battleship</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div id="tabellone">
        <table>
            <?php
            for ($i = 0; $i < 10; $i++) {
                echo "<tr>";
                for ($j = 0; $j < 10; $j++) {
                    echo "<td class='cella' ></td>";
                }
                echo "</tr>";
            }
            ?>
        </table>
    </div>
    <br>
    <div id="nave">
        <form action=".php" method="post">
            <input type="radio" name="nave" value="1">Incrociatore
            <input type="radio" name="nave" value="2">Sottomarino 1
            <input type="radio" name="nave" value="3">Sottomarino 2
            <input type="radio" name="nave" value="4">Cacciatorpediniere 1
            <input type="radio" name="nave" value="5">Cacciatorpediniere 2
            <input type="radio" name="nave" value="6">Cacciatorpediniere 3
            <br>
            <input onclick="ruota()" type="submit" value="ruota">
            <input onclick="posiziona()" type="submit" value="posiziona">

        </form>

        <script>
            function ruota() {

            }



            function posiziona() {

            }
        </script>
</body>

</html>

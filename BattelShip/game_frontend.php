<?php
$turno = 0;
require_once 'class/SqlConnection.php';
require_once 'class/BattelShip.php';
session_start();
$nickname=$_SESSION['nickname'];
//TODO: mostrare propria tabella, gioco funzione click, aspettare avversario

$db = new SqlConnection('127.0.0.1', 'root', null, 'battagliaNavalePacchiotti');
$db->connect();
$tabella_giocatore = $db->query("SELECT tabella FROM giocatore WHERE nickname = $nickname");
$result = $result->fetch_row();




?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Corazzata Cucuzza - Game</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <h1><?php echo $nickname;?></h1>

    <table class="red">
        <?php for ($i = 0; $i < 10; $i++) { ?>
        <tr>
            <?php for ($j = 0; $j < 10; $j++) { ?>
            <td
            onclick="shoot(<?php echo ($i . ',' . $j) ?>)" <?php if ($turno != 0) {
                echo 'disabled';
            } ?>></td>
            <?php } ?>
        </tr>
        <?php } ?>
    </table>


    <br>


    <table class="blu">
        <?php for ($i = 0; $i < 10; $i++) { ?>
        <tr>
            <?php for ($j = 0; $j < 10; $j++) { ?>
            <td></td>
            <?php } ?>
        </tr>
        <?php } ?>
    </table>



    <script>

    </script>
</body>


</html>

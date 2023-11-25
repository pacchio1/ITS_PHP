<?php

require '../class/SqlConnection.php';

session_start();
$nickname=$_SESSION['nickname'];
$id=$_SESSION['id'];

//TODO: gioco funzione click, (host fare prima mossa) aspettare avversario

$db = new SqlConnection('127.0.0.1', 'root', null, 'battagliaNavalePacchiotti');
$db->connect();
$tabella_giocatore = $db->query('SELECT tabella FROM giocatori WHERE nickname ='. "'".$nickname. "'");
$tabella_giocatore = $tabella_giocatore->fetch_row();
$tabella_giocatore = json_decode($tabella_giocatore[0]);
//var_dump(($tabella_giocatore));
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Corazzata Cucuzza - Game</title>
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <h1><?php echo $nickname;
        $url = "/game.php?id={$id}";
        echo "<a href='$url'> gioca! </a>, $url";?></h1>
<h2>Colpisci:</h2>
    <table class="red" id="tabellone">
        <?php for ($i = 0; $i < 10; $i++) { ?>
        <tr>
            <?php for ($j = 0; $j < 10; $j++) { ?>
            <td id="<?php echo ($i . '_' . $j) ?>"
            onclick="shoot(<?php echo ($i . ',' . $j) ?>)"></td>
            <?php } ?>
        </tr>
        <?php } ?>
    </table>


    <br>

<h2>La tua flotta:</h2>
    <table class="blu">
        <?php for ($i = 0; $i < 10; $i++) { ?>
        <tr>
            <?php for ($j = 0; $j < 10; $j++) { ?>
            <td <?php  if($tabella_giocatore[$i][$j]=='X'){
                echo 'class="' . 'occupate"';} ?>></td>
            <?php } ?>
        </tr>
        <?php } ?>
    </table>



    <script>
        function shoot(i, j) {
        console.log("sparato a: " + i + " " + j);
        var tdElement = document.getElementById(i + "_" + j);
        tdElement.removeAttribute("onclick");
        tdElement.setAttribute("class", "selected");
        var coordinates = {i,j}
            //ajax per colpire
            $.ajax({
                type: 'POST',
                url: 'game_backend.php',
                data: {
                    coordinates: coordinates

                },
                success: function(response) {
                    //TODO: far capire utente se ha colpito o meno

                    var tabellone = document.getElementById("tabellone");
                    tabellone.setAttribute("class", "waiting");
                },
                error: function() {
                    alert('Si è verificato un errore nel colpire la cella');
                }
            });
        }
    </script>
</body>


</html>

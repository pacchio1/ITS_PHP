<?php

require '../class/SqlConnection.php';
//TODO: gioco funzione click, (host fare prima mossa) aspettare avversario
session_start();

$nickname=$_SESSION['nickname'];
$id=$_SESSION['id'];

$turno=$_SESSION['turno'];


$db = new SqlConnection('127.0.0.1', 'root', null, 'battagliaNavalePacchiotti');
$db->connect();
$tabella_giocatore = $db->query('SELECT tabella FROM giocatori WHERE nickname ='. "'".$nickname. "'");
$tabella_giocatore = $tabella_giocatore->fetch_row();
//var_dump($tabella_giocatore);
if ($tabella_giocatore==0){
    //debug:
    $tabella_giocatore=array(
    array('O', 'O', 'O', 'O', 'X', 'O', 'O', 'O', 'O', 'O'),
    array('O', 'O', 'O', 'O', 'X', 'O', 'O', 'O', 'O', 'O'),
    array('O', 'O', 'O', 'O', 'X', 'O', 'O', 'O', 'O', 'O'),
    array('O', 'O', 'O', 'O', 'X', 'O', 'O', 'O', 'O', 'O'),
    array('O', 'O', 'X', 'O', 'O', 'O', 'X', 'O', 'O', 'O'),
    array('O', 'O', 'X', 'O', 'O', 'O', 'X', 'O', 'O', 'O'),
    array('O', 'O', 'X', 'O', 'O', 'O', 'X', 'O', 'O', 'O'),
    array('O', 'O', 'X', 'O', 'O', 'O', 'X', 'O', 'O', 'O'),
    array('O', 'O', 'X', 'O', 'O', 'O', 'X', 'O', 'O', 'O'),
    array('O', 'O', 'X', 'O', 'O', 'O', 'X', 'O', 'O', 'O'));
}else{
    $tabella_giocatore = json_decode($tabella_giocatore[0]);
}?>

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
    <h1><?php echo $_SESSION['host'].' VS '.$_SESSION['sfidante'].' Turno:'.$_SESSION['turno'];?> </div></h1>
    <h2><?php echo "\n /game.php?id={$id}";?></h2>

    <h2>Colpisci:<div id="mossa"></div></h2>
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
<div id="stato_div"></div>
    <br>
<h2>La tua flotta: <?php echo $nickname;?></h2>
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
    var turno = 0;
    var stato_div = document.getElementById("stato_div");
    var stato = "";
    var id = "<?php echo $id; ?>";
    var mossa = document.getElementById("mossa");
    var tabellone = document.getElementById("tabellone");
    //setTimeout(GetAjax, 4000); // Ritarda la prossima chiamata di 4 secondi
    function GetAjax() {
        // get per ottenere se ha finito l' avversario

        $.ajax({
            type: 'GET',
            url: 'game_backend.php',
            data: {
                risultato: stato
            },
            success: function(response) {
                console.log("1 ciclo e stato fatto");
                if(<?php echo $_SESSION['turno'] ?>%2==0){
                    tabellone.setAttribute("class", "waiting");
                }else{
                    tabellone.setAttribute("class", "red");
                }

            },
            error: function() {
                console.log('Si è verificato un errore durante la chiamata AJAX(get)');
            }
        });
    }

    function shoot(i, j) {
        var coordinates = {i,j};
        var tdElement = document.getElementById(i + "_" + j);
        tdElement.removeAttribute("onclick");
        tdElement.setAttribute("class", "selected");
        console.log("sparato a: " + i + " " + j);
        tabellone.setAttribute("class", "waiting");
        $.ajax({
            type: 'POST',
            url: 'game_backend.php',
            data: {
                coordinates: coordinates,
            },
            success: function(response) {
                mossa.innerText=coordinates.i + "," + coordinates.j;
                stato_div.innerText=stato
                GetAjax();
            },
            error: function() {
                console.log('Si è verificato un errore durante la chiamata AJAX (Post)');
            }
        });
    }
    </script>
</body>
</html>

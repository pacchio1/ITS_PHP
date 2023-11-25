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

if ($tabella_giocatore==0){
    //caso debug:
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
    array('O', 'O', 'X', 'O', 'O', 'O', 'X', 'O', 'O', 'O')
);}else{
    $tabella_giocatore = json_decode($tabella_giocatore[0]);
}

//var_dump(($tabella_giocatore));

//FIXME: errore nello sfidante o nel ajax
$sfidante=$db->query("SELECT nicknameSfidante FROM partita WHERE ID_Partita = '$id'");
$sfidante = $sfidante->fetch_row();
$sfidante= $sfidante[0];
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
    <h1><?php echo $nickname;?> VS <div id="sfidante"></div></h1>
    <h2><?php $url = "\n /game.php?id={$id}";
        echo  $url;?></h2>
<h2>Colpisci:</h2><div id="mossa"></div>
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
        var turno = 0;
        var sfidante = document.getElementById("sfidante");
        function GetAjax() {
                            // get per ottenere se ha finito l' avversario
                            $.ajax({
                                type: 'GET',
                                url: 'game_backend.php',
                                data: {
                                    turno: turno
                                    //todo: gettare lo stato
                                },

                                success: function(response) {
                                    console.log("1 ciclo e stato fatto");
                                    setTimeout(GetAjax, 3000); // Ritarda la prossima chiamata di 2 secondi
                                    sfidante.innerText = <?php echo '"'.$sfidante . '"'; ?>;  ?
                                },
                                error: function() {

                                }
                            });
                    }//funzione
        function shoot(i, j) {
        console.log("sparato a: " + i + " " + j);
        var tdElement = document.getElementById(i + "_" + j);
        tdElement.removeAttribute("onclick");
        tdElement.setAttribute("class", "selected");
        var mossa = document.getElementById("mossa");
        var stati = ["water", "hit", "sicked"];
        var coordinates = {i,j};
        var tabellone = document.getElementById("tabellone");
        tabellone.setAttribute("class", "waiting");

            //ajax per colpire
            $.ajax({
                type: 'POST',
                url: 'game_backend.php',
                data: {
                    coordinates: coordinates,
                    nickname: <?php echo $nickname; ?>
                },
                success: function(response) {
                    //TODO: far capire utente se ha colpito o meno
                    mossa.innerText=coordinates.i + "," + coordinates.j;
                    GetAjax();
                },
                error: function() {
                    alert('Si è verificato un errore nel colpire la cella');
                }
            });
        }
    </script>
</body>


</html>

<?php
include 'class/BattelShip.php';
include 'class/SqlConnection.php';

session_start();
ob_start();

$db = new SqlConnection('127.0.0.1', 'root', null, 'battagliaNavalePacchiotti');
$db->connect();
$nk=$_SESSION['nickname'];

$game = new BattelShip();
$navi_posizionate = false;


// TODO: capire come mandarli/arrivano dal frontend
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tabella = $_POST['tabella'];

    //var_dump($tabella);


    foreach ($tabella as $nave) {
        $x = $nave[0];
        $y = $nave[1];
        $orientamento = $nave[2];
        $boat_type = $nave[3];

        try {
            if (!($x < 10 and $x >= 0)) {
                throw new Exception("X non valida");
            }
            if (!($y < 10 and $y >= 0)) {
                throw new Exception("Y non valida");
            }
            $game->set_tabA($game->posizionaNave($x, $y, $orientamento, $boat_type, $game->get_tabA()));
            $navi_posizionate = true;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    if ($navi_posizionate) {

        //echo $game->visualizzaTabella($game->get_tabA());
        $game->salvaStatoGioco($game->get_tabA(),$nk, $db);
        ob_end_flush();
        header("Location: lobby.php");
    }
}


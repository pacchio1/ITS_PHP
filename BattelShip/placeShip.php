<?php
include 'class/BattelShip.php';
include 'class/SqlConnection.php';

session_start();

$db = new SqlConnection('127.0.0.1', 'root', null, 'battagliaNavalePacchiotti');
$db->connect();

$game = new BattelShip();
$navi_posizionate = false;

// TODO: capire come mandarli/arrivano dal frontend
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tabella = json_decode(file_get_contents('php://input'), true);

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
        $game->salvaStatoGioco($game->get_tabA(),$_SESSION['nickname'], $db);
        header("Location: lobby.php");
    }
}


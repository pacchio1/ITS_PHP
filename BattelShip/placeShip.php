<?php
include 'class/BattelShip.php';
include 'class/SqlConnection.php';

$db = new SqlConnection('127.0.0.1', 'root', null, 'battagliaNavalePacchiotti');
$db->connect();

$game = new BattelShip();
$navi_posizionate = false;

while ($navi_posizionate) {
    $x = 0;
    $y = 0;
    $orientamento = '';
    $boat_type = '';
    //TODO: input delle navi da front-end
    try {
        if (!($x < 10 and $x >= 0)) {
            throw new Exception("X non valida");
        }
        if (!($y < 10 and $y >= 0)) {
            throw new Exception("Y non valida");
        }
        $game->set_tabA($game->posizionaNave($x, $y, $orientamento, $boat_type, $game->get_tabA()));
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}

header("Location: lobby.php");

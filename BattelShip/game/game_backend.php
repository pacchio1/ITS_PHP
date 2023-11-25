<?php
require_once '../class/SqlConnection.php';
require_once '../class/BattelShip.php';
//TODO: aggiungere lo sfidante al data base

session_start();
ob_start();

//TODO: ogni turno leggo le tabelle da database, posiziono il click casella, salvo, faccio partire evento per cambiare turno
$coordinates=$_POST['coordinates'];
$nickname=$_POST['nickname'];
$gioco = new BattelShip();
$tabella_host=0;
$tabella_host=0;
$turno=0;

function turno($tabella_enemy, $gioco, $coordinates){
    $tabella_enemy = $gioco->attacca($coordinates[0],$coordinates[1], $tabella_enemy);
    return $tabella_enemy;
}

while (!$fine) {
    if ($turno % 2 == 0) {
        //echo "È il turno del host\n";
        $tabella_opponent = turno($tabella_opponent, $gioco, $coordinates);
        if ($gioco->controllaVittoria($tabella_opponent)) {
            $fine = true;

            //TODO: aggiungere al db il vincitore
        }
    } else {
        echo "È il turno dello sfidante\n";
        $tabella_host = turno($tabella_opponent, $tabella_host, $gioco);
        $gioco->controllaVittoria($tabella_opponent);
        if ($gioco->controllaVittoria($tabella_host)) {
            $fine = true;
            echo "B ha vinto";
            //TODO: aggiungere al db il vincitore
        }
    }
    //TODO: aggiungere post fine turno
    $_GET['turno']=$turno++;
}

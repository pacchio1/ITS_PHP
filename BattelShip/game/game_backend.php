<?php
require_once '../class/SqlConnection.php';
require_once '../class/BattelShip.php';

session_start();
ob_start();
//TODO: ogni turno leggo le tabelle, posiziono il click casella, salvo, faccio partire evento per cambiare turno
$coordinates=$_POST['coordinates'];

$gioco = new BattelShip();


function turno($tabella_player, $tabella_enemy, $gioco, $coordinates)
{
    echo "Tabella attuale la tua mappa: \n";
    $gioco->visualizzaTabella($tabella_player);
    echo "Inserisci una coordinata X: ";

    $tabella_enemy = $gioco->attacca($coordinates[0],$coordinates[1], $tabella_enemy);
    return $tabella_enemy;
}

while (!$fine) {
    if ($turno % 2 == 0) {
        echo "È il turno del host\n";
        $tabella_B = turno($tabella_A, $tabella_B, $gioco);
        if ($gioco->controllaVittoria($tabella_B)) {
            $fine = true;
            echo "A ha vinto";
        }
    } else {
        echo "È il turno dello sfidante\n";
        $tabella_A = turno($tabella_B, $tabella_A, $gioco);
        $gioco->controllaVittoria($tabella_B);
        if ($gioco->controllaVittoria($tabella_A)) {
            $fine = true;
            echo "B ha vinto";
        }
    }

    $turno++;
}

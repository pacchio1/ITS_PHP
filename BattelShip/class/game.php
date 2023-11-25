<?php
include 'BattelShip.php';

//soluzione cli delle problema(fatto per capire ed implementare piu facilmente la classe BattelShip)

$gioco = new BattelShip();
$turno = 1;
$fine = false;
$boat_to_place = 6;
$tabella_A = array(
    array('O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O'),
    array('O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O'),
    array('O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O'),
    array('O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O'),
    array('O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O'),
    array('O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O'),
    array('O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O'),
    array('O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O'),
    array('O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O'),
    array('O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O')
);
$tabella_B =  array(
    array('O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O'),
    array('O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O'),
    array('O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O'),
    array('O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O'),
    array('O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O'),
    array('O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O'),
    array('O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O'),
    array('O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O'),
    array('O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O'),
    array('O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O')
);

function posizionare($boat_to_place, $gioco, $tabella_su_cui_posizionare)
{


    for ($i = 0; $i < $boat_to_place; $i++) {
        echo "Tabella attuale: \n";
        $gioco->visualizzaTabella($tabella_su_cui_posizionare);
        if ($i == 0) {
            echo "posiziona la tua corazzata ";
            $nave_da_posizionare = 'corazzata';
        }
        if ($i == 1) {
            echo "posiziona il primo sottomarino ";
            $nave_da_posizionare = 'sottomarino';
        }
        if ($i == 2) {
            echo "posiziona il secondo sottomarino ";
            $nave_da_posizionare = 'sottomarino';
        }
        if ($i == 3) {
            echo "posiziona il primo cacciatorpediniere ";
            $nave_da_posizionare = 'cacciatorpediniere';
        }
        if ($i == 4) {
            echo "posiziona il secondo cacciatorpediniere ";
            $nave_da_posizionare = 'cacciatorpediniere';
        }
        if ($i == 5) {
            echo "posiziona il terzo cacciatorpediniere ";
            $nave_da_posizionare = 'cacciatorpediniere';
        }
        echo "Inserisci le coordinate per la nave " . ($i + 1) . "X: ";
        $input1 = readline();
        echo "Inserisci le coordinate per la nave " . ($i + 1) . "Y: ";
        $input2 = readline();
        echo "Inserisci l'orientamento della nave 1orizzontale 2verticale: ";

        $in_orientamento = readline();
        if ($in_orientamento == 1) {
            $orientamento = "orizzontale";
        }
        if ($in_orientamento == 2) {
            $orientamento = "verticale";
        }
        try {
            $tabella_su_cui_posizionare = $gioco->posizionaNave(
                $input1,
                $input2,
                $orientamento,
                $nave_da_posizionare,
                $tabella_su_cui_posizionare
            );
        } catch (Exception $e) {
            echo $e->getMessage();
            $i--;
        }
    }
}

echo "A posiziona le tue navi";
posizionare($boat_to_place, $gioco, $gioco->set_tabB($tabella_A));
echo "B posiziona le tue navi";
posizionare($boat_to_place, $gioco, $gioco->set_tabB($tabella_B));

// dati di prova
/* $tabella_A = array(
    array('X', 'X', 'X', 'X', 'O', 'O', 'O', 'O', 'O', 'X'),
    array('O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O'),
    array('O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O'),
    array('O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O'),
    array('O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O'),
    array('O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O'),
    array('O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O'),
    array('O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O'),
    array('O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O'),
    array('O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O')
);
$tabella_B =  array(
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
); */
function turno($tabella_player, $tabella_enemy, $gioco,)
{
    echo "Tabella attuale la tua mappa: \n";
    $gioco->visualizzaTabella($tabella_player);
    echo "Inserisci una coordinata X: ";
    $input1 = readline();
    echo "Inserisci una coordinata Y: ";
    $input2 = readline();
    $tabella_enemy = $gioco->attacca($input1, $input2, $tabella_enemy);
    return $tabella_enemy;
}

while (!$fine) {
    if ($turno % 2 == 0) {
        echo "È il turno di A\n";
        $tabella_B = turno($tabella_A, $tabella_B, $gioco);
        if ($gioco->controllaVittoria($tabella_B)) {
            $fine = true;
            echo "A ha vinto";
        }
    } else {
        echo "È il turno di B\n";
        $tabella_A = turno($tabella_B, $tabella_A, $gioco);
        $gioco->controllaVittoria($tabella_B);
        if ($gioco->controllaVittoria($tabella_A)) {
            $fine = true;
            echo "B ha vinto";
        }
    }

    $turno++;
}

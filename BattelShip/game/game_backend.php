<?php
require_once '../class/SqlConnection.php';
require_once '../class/BattelShip.php';

//TODO: posiziono il click casella, salvo, faccio partire evento per cambiare turno

session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    var_dump($_POST);
    $x=$_POST['i'];
    $y=$_POST['j'];
    $nickname=$_SESSION['nickname'];
    $id=$_SESSION['id'];
    $sfidante=$_SESSION['sfidante'];
    $host=$_SESSION['host'];


    $gioco = new BattelShip();


    $db= new SqlConnection('127.0.0.1', 'root', null, 'battagliaNavalePacchiotti');
    $db->connect();

    $turno_db=$db->query("SELECT turno FROM partita WHERE ID_Partita = '$id'");


    $turno_db = $turno_db->fetch_row();
    $turno_db= $turno_db[0];

    $turno=$turno_db;


    $tabella_sfidante=$db->query("SELECT tabella FROM giocatori WHERE nickname = '$sfidante'");
    $tabella_sfidante = $tabella_sfidante->fetch_row();

    $tabella_host=$db->query("SELECT tabella FROM giocatori WHERE nickname = '$host'");
    $tabella_host = $tabella_host->fetch_row();

    var_dump($tabella_sfidante);
    var_dump($tabella_host);

    function turno($tabella_enemy, $gioco, $x, $y){
        $tabella_enemy = $gioco->attacca($x,$y, $tabella_enemy);
        $_SESSION['risultato']=$tabella_enemy[1];
        return $tabella_enemy[0];
    }


    if ($turno % 2 == 0) {
        //echo "È il turno del host\n";
        $tabella_sfidante = turno($tabella_sfidante, $gioco,$x,$y);
        if ($gioco->controllaVittoria($tabella_sfidante)) {
            $gioco->SalvaVincitore($host,$sfidante,$nickname,$db);
            $_SESSION['vittoria']='host';
        }
        $turno=$turno+1;

    } else {
        //echo "È il turno dello sfidante\n";
        $tabella_host = turno($tabella_host, $gioco, $x, $y);
        $gioco->controllaVittoria($tabella_sfidante);
        if ($gioco->controllaVittoria($tabella_host)) {
            $gioco->SalvaVincitore($host,$sfidante,$nickname,$db);
            $_SESSION['vittoria']='sfidante';
        }
        $turno=$turno+1;
    }


    $turno_db=$db->query("UPDATE partita SET turno='$turno' WHERE ID_Partita = '$id'");
    $_SESSION['turno']=$turno;
}
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $_GET['risultato']=$_SESSION['risultato'];

}



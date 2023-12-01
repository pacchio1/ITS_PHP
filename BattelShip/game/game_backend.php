<?php
require_once '../class/SqlConnection.php';
require_once '../class/BattelShip.php';

//TODO: posiziono il click casella, salvo, faccio partire evento per cambiare turno

session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //var_dump($_POST);
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
    $row = $tabella_sfidante->fetch_assoc();
    $tabella = json_decode($row['tabella'], true);
    $tabella_sfidante=$tabella;

    $tabella_host=$db->query("SELECT tabella FROM giocatori WHERE nickname = '$host'");
    $row = $tabella_host->fetch_assoc();
    $tabella = json_decode($row['tabella'], true);
    $tabella_host=$tabella;

    //var_dump($tabella_sfidante);
    //var_dump($tabella_host);


    function turno($tabella_enemy, $gioco, $x, $y){
        $tabella_enemy = $gioco->attacca($x,$y, $tabella_enemy);
        $_SESSION['risultato']=$tabella_enemy[1];

        return $tabella_enemy[0];
    }
//TODO: Gestire turni per bloccare sbloccare campo

    if ($turno % 2 != 0) {
        //echo "È il turno del host\n";
        $tabella_sfidante =  turno($tabella_sfidante, $gioco,$x,$y);
        $_SESSION['stillPlaying']='host';
        if ($gioco->controllaVittoria($tabella_sfidante)) {
            $gioco->SalvaVincitore($host,$sfidante,$host,$db);
            $_SESSION['vittoria']='host';
        }
        $gioco->salvaStatoGioco($tabella_sfidante,$host,$db);
        $turno=$turno+1;
        $db->query("UPDATE partita SET whoisplaying='$host' WHERE ID_Partita = '$id'");
    } else {
        //echo "È il turno dello sfidante\n";
        $tabella_host =  turno($tabella_host, $gioco, $x, $y);
        $_SESSION['stillPlaying']='sfidante';
        if ($gioco->controllaVittoria($tabella_host)) {
            $gioco->SalvaVincitore($host,$sfidante,$sfidante,$db);
            $_SESSION['vittoria']='sfidante';
        }
        $gioco->salvaStatoGioco($tabella_host,$sfidante,$db);
        $turno=$turno+1;
        $db->query("UPDATE partita SET whoisplaying='$sfidante' WHERE ID_Partita = '$id'");
    }
    var_dump($tabella_sfidante);
    echo "\n ------------------------------------------";
    var_dump($tabella_host);
    echo "\n ------------------------------------------";
    echo "\n ------------------------------------------";
    var_dump($turno);
    echo "\n ------------------------------------------";
    echo($_SESSION['vittoria']);


    $turno_db=$db->query("UPDATE partita SET turno='$turno' WHERE ID_Partita = '$id'");
    $_SESSION['turno']=$turno;
}
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    echo $_SESSION['risultato']." , ".$_SESSION['vittoria'];
}



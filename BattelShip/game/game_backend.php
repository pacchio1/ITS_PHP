<?php
require_once '../class/SqlConnection.php';
require_once '../class/BattelShip.php';

//TODO: posiziono il click casella, salvo, faccio partire evento per cambiare turno

session_start();

$coordinates=$_POST['coordinates'];
$nickname=$_POST['nickname'];//nome di chi sta giocando adesso


$gioco = new BattelShip();


$db= new SqlConnection('127.0.0.1', 'root', null, 'battagliaNavalePacchiotti');
$db->connect();

$turno=$db->query("SELECT turno FROM partita WHERE ID_Partita = '$id'");
$turno = $turno->fetch_row();
$turno= $turno[0];


if($turno==0){
$id=$_SESSION['id'];
$sfidante=$db->query("SELECT nicknameSfidante FROM partita WHERE ID_Partita = '$id'");
$sfidante = $sfidante->fetch_row();
$sfidante= $sfidante[0];
$_SESSION['sfidante']=$sfidante;

$host=$db->query("SELECT nicknameHost FROM partita WHERE ID_Partita = '$id'");
$host = $host->fetch_row();
$host= $host[0];
$_SESSION['host']=$host;
}

$tabella_sfidante=$db->query("SELECT tabella FROM giocatori WHERE nickname = '$sfidante'");
$tabella_sfidante = $tabella_sfidante->fetch_row();

$tabella_host=$db->query("SELECT tabella FROM giocatori WHERE nickname = '$host'");
$tabella_host = $tabella_host->fetch_row();

var_dump($tabella_sfidante);
var_dump($tabella_host);

function turno($tabella_enemy, $gioco, $coordinates){
    $tabella_enemy = $gioco->attacca($coordinates[0],$coordinates[1], $tabella_enemy);
    $_SESSION['risultato']=$tabella_enemy[1];
    return $tabella_enemy[0];
}


if ($turno % 2 == 0) {
    //echo "È il turno del host\n";
    $tabella_sfidante = turno($tabella_sfidante, $gioco, $coordinates);
    if ($gioco->controllaVittoria($tabella_sfidante)) {
        $gioco->SalvaVincitore($host,$sfidante,$nickname,$db);
    }

} else {
    //echo "È il turno dello sfidante\n";
    $tabella_host = turno($tabella_host, $gioco, $coordinates);
    $gioco->controllaVittoria($tabella_sfidante);
    if ($gioco->controllaVittoria($tabella_host)) {
        $gioco->SalvaVincitore($host,$sfidante,$nickname,$db);
    }
}

$turno=$turno+1;
$_SESSION['turno']=$db->query("UPDATE partita SET turno='$turno' WHERE ID_Partita = '$id'");
$_SESSION['turno']=$_SESSION['turno']->fetch_row();
$_SESSION['turno']=$_SESSION['turno'][0];





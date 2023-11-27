<?php
require_once '../class/SqlConnection.php';
require_once '../class/BattelShip.php';

session_start();
ob_start();

//TODO: posiziono il click casella, salvo, faccio partire evento per cambiare turno
$coordinates=$_POST['coordinates'];
$nickname=$_POST['nickname'];//nome di chi è in questo momento
$id=$_POST['id'];
$turno=$_POST['turno'];
//input: coordinate attacco  / nickname di chi attacca / id
$gioco = new BattelShip();


$db= new SqlConnection('127.0.0.1', 'root', null, 'battagliaNavalePacchiotti');
$db->connect();

$sfidante=$db->query("SELECT nicknameSfidante FROM partita WHERE ID_Partita = '$id'");
$sfidante = $sfidante->fetch_row();
$sfidante= $sfidante[0];
$_GET['sfidante']=$sfidante;

$sfidante=$db->query("SELECT nicknameHost FROM partita WHERE ID_Partita = '$id'");
$host = $host->fetch_row();
$host= $host[0];
$_GET['host']=$host;

$tabella_sfidante=$db->query("SELECT tabella FROM giocatori WHERE nickname = '$sfidante'");
$tabella_sfidante = $tabella_sfidante->fetch_row();

$tabella_host=$db->query("SELECT tabella FROM giocatori WHERE nickname = '$host'");
$tabella_host = $tabella_host->fetch_row();



function turno($tabella_enemy, $gioco, $coordinates){
    $tabella_enemy = $gioco->attacca($coordinates[0],$coordinates[1], $tabella_enemy);
    $_GET['risultato']=$tabella_enemy[1];
    return $tabella_enemy[0];
}


if ($turno % 2 == 0) {
    //echo "È il turno del host\n";
    $tabella_opponent = turno($tabella_opponent, $gioco, $coordinates);
    if ($gioco->controllaVittoria($tabella_opponent)) {
        $gioco->SalvaVincitore($host,$sfidante,$nickname,$db);
    }
} else {
    //echo "È il turno dello sfidante\n";
    $tabella_host = turno($tabella_host, $gioco, $coordinates);
    $gioco->controllaVittoria($tabella_opponent);
    if ($gioco->controllaVittoria($tabella_host)) {
        $gioco->SalvaVincitore($host,$sfidante,$nickname,$db);
    }
}
//TODO: aggiungere post fine turno
$_GET['turno']=$turno++;




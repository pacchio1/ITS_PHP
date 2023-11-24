<?php
//TODO: da metodo get gestire la lobby della partita
include 'class/SqlConnection.php';
include 'class/BattelShip.php';
session_start();

if (!isset($_POST['nickname'])) {
    ob_start();
    echo "<a href='html/nickname_opponent.html'><h1> registrati! </h1></a>";
    ob_end_flush();
    exit();
}

$id=$_GET['id'];
$nk=$_SESSION['nickname'];
$db = new SqlConnection('127.0.0.1', 'root', null, 'battagliaNavalePacchiotti');
$db->connect();

$sql_partita="SELECT * FROM partita WHERE ID_Partita=$id";
$sql_giocatori="SELECT tabella FROM giocatori WHERE nickname='$nk'";
//TODO: caso in cui partita.nicknameSfidante = $nk, aggiungere una variabile per nicknameSfidante

$partita=$db->query($sql_partita);
$giocatori=$db->query($sql_giocatori);

var_dump($partita);
var_dump($giocatori);


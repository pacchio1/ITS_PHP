<?php
//TODO: da metodo get gestire la lobby della partita
include 'class/SqlConnection.php';
include 'class/BattelShip.php';
session_start();

if (!isset($_SESSION['nickname'])) {
    ob_start();
    echo "<a href='html/nickname_opponent.html'><h1> registrati! </h1></a>";
    ob_end_flush();
    $_SESSION['id']=$_GET['id'];
    exit();
}

$id=$_GET['id'];
$nk=$_SESSION['nickname'];
//echo $nk;
$db = new SqlConnection('127.0.0.1', 'root', null, 'battagliaNavalePacchiotti');
$db->connect();

$sql_partita="SELECT * FROM partita WHERE ID_Partita=". "'" .$id . "'" ;
$sql_giocatori="SELECT tabella FROM giocatori WHERE nickname='$nk'";


$partita=$db->query($sql_partita);
$giocatori=$db->query($sql_giocatori);

header('Location: game_frontend.php');





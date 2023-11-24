<?php
include 'class/SqlConnection.php';
session_start();
$id_sessione = uniqid();
$nickname = $_SESSION['nickname'];
$_SESSION['id_sessione']=$id_sessione ;
echo "<h1> benvenuto $nickname </h1>";
$url = "/game.php?id={$id_sessione}";
echo "<a href='$url'> gioca! </a>, $url";

//TODO: aggiornare id della partita dal database,tutta la tabella partita

$db = new SqlConnection('127.0.0.1', 'root', null, 'battagliaNavalePacchiotti');
$db->connect();
$db->query("INSERT INTO partita (ID_Partita, nicknameHost) VALUES ('$id_sessione', '$nickname')");
$db->close();

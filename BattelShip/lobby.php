<?php
include 'class/SqlConnection.php';
session_start();
$nickname = $_SESSION['nickname'];
$id_sessione = $_SESSION['id_sessione'];
echo "<h1> benvenuto $nickname </h1>";
$url = "/game.php?id={$id_sessione}";
echo "<a href='$url'> gioca! </a>, $url";
//TODO: aggiornare id della partita dal database

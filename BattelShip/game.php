<?php
//TODO: router per il gioco
include 'class/SqlConnection.php';
include 'class/BattelShip.php';
session_start();

if (!isset($_SESSION['nickname'])) {
    //ob_start();
    echo "<a href='html/nickname_opponent.html'><h1> registrati! </h1></a>";
    //ob_end_flush();
    $_SESSION['id']=$_GET['id'];
    exit();
}
$id=$_GET['id'];
$nk=$_SESSION['nickname'];
$_SESSION['id']=$id;

header('Location: game/game_frontend.php');





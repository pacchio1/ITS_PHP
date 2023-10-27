<?php
session_start();

$nk = $_POST['nickname'];
$_SESSION['nickname'] = $nk;

if ($nk == null) {
    echo "<a href='nickname.html'><h1> registrati! </h1></a>";
    exit();
}
echo "<h1> benvenuto $nk </h1>";

$id_sessione = uniqid();

$_SESSION['id_sessione'] = $id_sessione;

$url = "www.sito.it/game.php?id={$id_sessione}";

echo "<a href='$url'> gioca! </a>, $url";

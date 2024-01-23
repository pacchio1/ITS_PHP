<?php
include 'class/SqlConnection.php';
include 'class/BattelShip.php';
session_start();

if (!isset($_SESSION['nickname'])) {
    //ob_start();
    echo "<a href='html/nickname_opponent.html'><h1> registrati! </h1></a>";
    //ob_end_flush();
    $_SESSION['id'] = $_GET['id'];
    exit();
}
$id = $_GET['id'];
$nickname = $_SESSION['nickname'];
$_SESSION['id'] = $id;
$_SESSION['turno'] = 0;

$db = new SqlConnection('127.0.0.1', 'root', null, 'battagliaNavalePacchiotti');
$db->connect();
$result = $db->query("SELECT COUNT(*) FROM partita WHERE ID_Partita = '$id'");
$result = $result->fetch_row();
$result = $result[0];
if ($result == 0) {
    $db->query("INSERT INTO partita (ID_Partita, turno ,nicknameHost, whoisplaying ) VALUES ('$id', 0, '$nickname', '$nickname')");
}

$db->close();

header('Location: game/game_frontend.php');

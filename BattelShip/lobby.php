<?php
include 'class/SqlConnection.php';
session_start();
$id_sessione = uniqid();
$nickname = $_SESSION['nickname'];
$_SESSION['id'] = $id_sessione;
echo "<h1> benvenuto $nickname </h1>";
$url = "/game.php?id={$id_sessione}";
echo "<a href='$url'> gioca! </a>, $url";

$db = new SqlConnection('127.0.0.1', 'root', null, 'battagliaNavalePacchiotti');
$db->connect();
$result = $db->query("SELECT COUNT(*) FROM partita WHERE ID_Partita = '$id_sessione'");
$result = $result->fetch_row();
$result = $result[0];
if ($result == 0) {
    $db->query("INSERT INTO partita (ID_Partita, nicknameHost) VALUES ('$id_sessione', '$nickname')");
}

$db->close();


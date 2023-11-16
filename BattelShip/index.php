<?php
include 'class/SqlConnection.php';
include 'class/Player.php';

session_start();

if (!isset($_POST['nickname'])) {
    ob_start();
    echo "<a href='html/nickname.html'><h1> registrati! </h1></a>";
    ob_end_flush();
    exit();
}

$player = new Player($_POST['nickname'], 'A');

$db = new SqlConnection('127.0.0.1', 'root', null, 'battagliaNavalePacchiotti');
$db->connect();
$nickname = $_POST['nickname'];
$tab = $player->getTabella();
$tab = json_encode($tab);

$result = $db->query("SELECT COUNT(*) FROM giocatori WHERE nickname = '$nickname'");
$row = $result->fetch_row();
$count = $row[0];
if ($count > 0) {

    $db->query("UPDATE giocatori SET tabella = '$tab' WHERE nickname = '$nickname'");
} else {
    $tab = $player->getTabella();
    $tab = json_encode($tab);
    $db->query("INSERT INTO giocatori (nickname, tabella) VALUES ('$nickname', '$tab')");
}

$db->close();
$id_sessione = uniqid();



$_SESSION['nickname'] = $nickname;
$_SESSION['id_sessione'] = $id_sessione;

header("Location: placeShip_frontend.php");

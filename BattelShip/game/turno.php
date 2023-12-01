<?php
require_once '../class/SqlConnection.php';

session_start();
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
$db= new SqlConnection('127.0.0.1', 'root', null, 'battagliaNavalePacchiotti');
$db->connect();
$id=$_SESSION['id'];


$whoisplaying=$db->query("SELECT whoisplaying FROM partita WHERE ID_Partita = '$id'");
$whoisplaying = $whoisplaying->fetch_row();
$whoisplaying= $whoisplaying[0];
echo $whoisplaying;

}

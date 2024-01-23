<?php
include 'class/SqlConnection.php';
session_start();
$id = uniqid();
$nickname = $_SESSION['nickname'];
$_SESSION['id'] = $id;
echo "<h1> benvenuto $nickname </h1>";
$url = "/game.php?id={$id}";
echo "<a href='$url'> gioca! </a>, $url";

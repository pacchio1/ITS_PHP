<?php
session_start();
$_SESSION['id']=$_POST['id'];
$_SESSION['nickname']=$_POST['nickname'];
$_SESSION['turno']=0;
header('Location: game/game_frontend.php');

<?php
require_once '../class/SqlConnection.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1><?php
    $db= new SqlConnection('127.0.0.1', 'root', null, 'battagliaNavalePacchiotti');
    $db->connect();
    $id=$_SESSION['id'];
    $winner=$db->query("SELECT vincitore FROM partita WHERE ID_Partita = '$id'");
    $winner = $winner->fetch_row();
    $winner= $winner[0];

    if($_SESSION['nickname']==$winner){
        echo $_SESSION['nickname']." hai vinto!";
    }else{
        echo $_SESSION['nickname']." hai perso!";
    }  ?></h1>
</body>
</html>

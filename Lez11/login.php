<?php
include 'class_login.php';
session_start();
$Login = new class_login();
try {
    $Login->Login($_POST['email'], $_POST['password'], 'login.html', 'index.php');
    $Login->SaveData($_POST['email'], $_POST['password']);
} catch (Exception $e) {
    echo $e->getMessage();
}

<?php
include 'class_login.php';
session_start();
$dsn = 'mysql:dbname=php_lezione;host=127.0.0.1';
$user = 'root';
$Login = new class_login();
try {
    $pdo = new PDO($dsn, $user);
    $Login->Login($_POST['email'], $_POST['password'], 'login.html', 'index.php');
    $Login->SaveDataInSql($_POST['email'], $_POST['password'], $pdo, 'login');
} catch (PDOException $e) {
    printf("Connection failed or bad datas: %s \n", $e->getMessage());
    exit(1);
}

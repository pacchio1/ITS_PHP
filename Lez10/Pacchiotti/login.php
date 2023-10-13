<?php
session_start();

$email = $_POST['email'];
$password = $_POST['password'];

if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false  && strlen($password) > 6) {
    $_SESSION['email'] = $email;
    header('Location: home.php');
    $file = fopen('login.txt', 'w');
    $password = md5($password);
    fwrite($file, '\n' . $email . ' ' . $password);
    fclose($file);
    exit();
} else {
    header('Location: login.html');
    exit();
}

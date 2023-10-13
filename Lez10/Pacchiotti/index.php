<?php
session_start();

if (!isset($_SESSION['email'])) {
    header('Location: /Php/Lez10/Pacchiotti/login.html');
    exit();
} else {
    header('Location: /Php/Lez10/Pacchiotti/home.php');
    exit();
}

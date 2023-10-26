<?php
session_start();
if (!isset($_SESSION['email'])) {
    header('Location: /Php/Lez11/login.html');
    exit();
} else {
    echo 'ciao';
    session_unset();
    exit();
}

<?php
if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) === false) {
    header('Location: /Php/Lez10/Pacchiotti/login.html');
} else {
    session_start();
    header('Location: /Php/Lez10/Pacchiotti/index.php');
}

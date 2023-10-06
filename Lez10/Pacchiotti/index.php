<?php
if (!isset($_SESSION)) {
    header('Location: /Php/Lez10/Pacchiotti/login.html');
} else {
    header('Location: /Php/Lez10/Pacchiotti/home.php');
}

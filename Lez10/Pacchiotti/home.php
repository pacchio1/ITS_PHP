<?php
session_start();

if (!isset($_SESSION['email'])) {
    echo ' <a href="login.html">Log in to view the site<a>';

    exit();
} else {
    echo '<img src="festa.jpeg"; style="width:25%;"><br> benvenuto nella setta.';
    session_unset();
}

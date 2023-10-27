<?php
$nk = $_POST['nickname'];
if (!isset($nk)) {
    echo "<a href='nickname.html'><h1> registrati! </h1></a>";
    exit();
}

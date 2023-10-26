<?php
$nk = $_POST['nickname'];
if ($nk == null) {
    echo "<a href='nickname.html'><h1> registrati! </h1></a>";
    exit();
}
echo "<h1> benvenuto $nk </h1>";

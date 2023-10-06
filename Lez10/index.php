<?php
if (!isset($_COOKIE["Privacy"])) {
    header('Location: /Php/Lez10/privacy.html');
} else {
    echo '<h1>Cookie is set</h1>
    <h3>benvenuto nel sito piu esclusivo del mondo</h3>
    <img src="/Php/festa.jpeg"; height=50%>';
}

<?php
require 'Studente_zimuel.php';
$io = new Studente();
$io->nome = "Marco";
$io->cognome = "Cognome";
$io->email = "email";
$io->dataDiNascita = "2002-11-09";
$io->addCorso("php programming");
var_dump($io);

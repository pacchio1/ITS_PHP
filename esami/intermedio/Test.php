<?php
#Pacchiotti
include 'User.php';
include 'CsvRead.php';
include 'CsvWrite.php';


$reader = new CsvReader('users.csv');
$users = $reader->readUsers();



foreach ($users as $user) {
    $user->setName($user->getName());
}



$writer = new CsvWriter('tmp.csv');
$writer->writeUsers($users);

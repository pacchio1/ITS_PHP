<?php
include 'PHP-DI_login.php';

if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $login = new class_login();
    try{
        $login->Login($email, $password, 'PHP-DI_login.php', 'success.html');
    }catch(Exception $e){
        echo $e->getMessage();
    }
}

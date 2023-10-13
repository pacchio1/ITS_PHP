<?php
class class_login
{
    private $email;
    private $password;

    public function BadRequest($posizione)
    {

        throw new Exception('Bad Datas');
        header('Location: ' . $posizione);
        exit();
    }
    public function Login($email, $password, $bad_page, $good_page)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false  && strlen($password) > 6) {
            $_SESSION['email'] = $email;
            header('Location:' . $good_page);
        } else {
            throw new Exception('Bad Datas');
        }
    }
    public function SaveData($email, $password)
    {
        $file = fopen('login.txt', 'w');
        $password = md5($password);
        fwrite($file, '\n' . $email . ' ' . $password);
        fclose($file);
    }
}

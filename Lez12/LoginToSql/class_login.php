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
    public function SaveDataFileFlat($email, $password)
    {
        $file = fopen('login.txt', 'w');
        $password = hash('sha256', $password);
        fwrite($file, '\n' . $email . ' ' . $password);
        fclose($file);
    }
    public function SaveDataInSql($email, $password, $pdo, $nome_tabella)
    {
        $sql = "INSERT INTO $nome_tabella (email, password) VALUES (:email, :password)";
        $stmt = $pdo->prepare($sql);
        $password = hash('sha256', $password);
        $email = $email;

        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);

        $stmt->execute();
    }
}

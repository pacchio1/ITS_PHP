<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php if($_SESSION['whoami']==$_SESSION['vittoria']){
        echo $_SESSION['nickname']." hai vinto!";
    }else{
        echo $_SESSION['nickname']." hai perso!";
    }  ?>
</body>
</html>

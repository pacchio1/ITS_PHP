<?php
require '../class/SqlConnection.php';
//TODO: gioco funzione click, (host fare prima mossa) aspettare avversario
session_start();

$nickname=$_SESSION['nickname'];
$id=$_SESSION['id'];
$turno=$_SESSION['turno'];
$_SESSION['risultato']='';
$_SESSION['vittoria']='';


$db = new SqlConnection('127.0.0.1', 'root', null, 'battagliaNavalePacchiotti');
$db->connect();
$tabella_giocatore = $db->query('SELECT tabella FROM giocatori WHERE nickname ='. "'".$nickname. "'");
$tabella_giocatore = $tabella_giocatore->fetch_row();

if ($tabella_giocatore==0){
    $tabella_giocatore=array(
    array('O', 'O', 'O', 'O', 'X', 'O', 'O', 'O', 'O', 'O'),
    array('O', 'O', 'O', 'O', 'X', 'O', 'O', 'O', 'O', 'O'),
    array('O', 'O', 'O', 'O', 'X', 'O', 'O', 'O', 'O', 'O'),
    array('O', 'O', 'O', 'O', 'X', 'O', 'O', 'O', 'O', 'O'),
    array('O', 'O', 'X', 'O', 'O', 'O', 'X', 'O', 'O', 'O'),
    array('O', 'O', 'X', 'O', 'O', 'O', 'X', 'O', 'O', 'O'),
    array('O', 'O', 'X', 'O', 'O', 'O', 'X', 'O', 'O', 'O'),
    array('O', 'O', 'X', 'O', 'O', 'O', 'X', 'O', 'O', 'O'),
    array('O', 'O', 'X', 'O', 'O', 'O', 'X', 'O', 'O', 'O'),
    array('O', 'O', 'X', 'O', 'O', 'O', 'X', 'O', 'O', 'O'));
}else{
    $tabella_giocatore = json_decode($tabella_giocatore[0]);
}
$id=$_SESSION['id'];
$sfidante=$db->query("SELECT nicknameSfidante FROM partita WHERE ID_Partita = '$id'");
$sfidante = $sfidante->fetch_row();
if($sfidante!=null){
    $sfidante= $sfidante[0];
    $_SESSION['sfidante']=$sfidante;
}
//echo "SELECT nicknameHost FROM partita WHERE ID_Partita like '$id'";
$host=$db->query("SELECT nicknameHost FROM partita WHERE ID_Partita like '$id'");
$host = $host->fetch_row();
$host= $host[0];
$_SESSION['host']=$host;
if($nickname==$_SESSION['sfidante']){
    $whoami='sfidante';
}if($nickname==$_SESSION['host']){
    $whoami='host';
}
$_SESSION['whoami']=$whoami;
if($whoami=='host')
{
    $tabella_sfidante=$db->query("SELECT tabella FROM giocatori WHERE nickname = '$sfidante'");
    $row = $tabella_sfidante->fetch_assoc();
    $tabella = json_decode($row['tabella'], true);
    $tab_sfidante=$tabella;
}
if($whoami=='sfidante'){
    $tabella_host=$db->query("SELECT tabella FROM giocatori WHERE nickname = '$host'");
    $row = $tabella_host->fetch_assoc();
    $tabella = json_decode($row['tabella'], true);
    $tab_sfidante=$tabella;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Corazzata Cucuzza - Game</title>
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <?php if(isset($_SESSION['host'])and $sfidante!=null and isset($turno)){
        echo "<h1>". $_SESSION['host'].' VS '.$sfidante.' Turno:'.$_SESSION['turno']."</div></h1>";
    }?>


    <h2><?php echo "\n /game.php?id={$id}";?></h2>

    <h2>Colpisci:<div id="mossa"></div></h2>
    <table class="red" id="tabellone">
        <?php for ($i = 0; $i < 10; $i++) { ?><tr>
            <?php for ($j = 0; $j < 10; $j++) { ?>
            <td id="<?php echo ($i . '_' . $j) ?>"onclick="shoot(<?php echo ($i . ',' . $j) ?>)">
                <?php if($tab_sfidante[$i][$j]=='H'){echo '<div class="hit">H</div>';}
                else if($tab_sfidante[$i][$j]=='M'){echo '<div class="water">M</div>';}?>
            </td>
            <?php } ?>
        </tr>
        <?php } ?>
    </table>
<div id="stato_div"></div>
    <br>
<h2>La tua flotta: <?php echo $nickname;?></h2>
    <table class="blu">
        <?php for ($i = 0; $i < 10; $i++) { ?>
        <tr>
            <?php for ($j = 0; $j < 10; $j++) { ?>
            <td <?php  if($tabella_giocatore[$i][$j]=='X'){
                echo 'class="' . 'occupate"';} ?>></td>
            <?php } ?>
        </tr>
        <?php } ?>
    </table>
    <script>

    var vittoria = "";
    var turno = 0;
    var stato_div = document.getElementById("stato_div");
    var risultato = "";
    var id = "<?php echo $id; ?>";
    var mossa = document.getElementById("mossa");
    var tabellone = document.getElementById("tabellone");
    tabellone.setAttribute("class", "waiting");

    function cambioTurno(){
        $.ajax({
        url: 'turno.php',
        method: 'GET',
        success: function(data) {
            console.log(data)
            if (data === <?php echo "'".$nickname."'"; ?>) {
                tabellone.setAttribute("class", "red");


            }
            else {
                tabellone.setAttribute("class", "waiting");
                location.reload();
            }
            if(data ==="partita_finita"){
                window.location.replace("vittoria.php");
            }


        },
        error: function(xhr, status, error) {
            console.log(error);
        }
        });
    }
    setInterval(cambioTurno, 5000);
    function GetAjax() {

        $.ajax({
            url: 'game_backend.php',
            method: 'GET',
            success: function(data){
                console.log(data);
                data=data.split(",");
                stato_div.innerText = "Risultato: " + data[0];
                vittoria = data[1];
                console.log(data[1]);
                if(vittoria==' host' || vittoria==' sfidante'){
                    window.location.replace("vittoria.php");
                }
                //console.log('vittoria'+vittoria)
            },
            error: function(xhr, status, error){
                console.log(error);
            }
        });
    }
    function shoot(i, j) {
        <?php $_SESSION['stillPlaying']=true; ?>
        var coordinates = [i,j];
        var tdElement = document.getElementById(i + "_" + j);
        tdElement.removeAttribute("onclick");
        tdElement.setAttribute("class", "selected");
        console.log("sparato a: " + i + " " + j);
        tabellone.setAttribute("class", "waiting");
        mossa.innerText=i + "," + j;
        $.ajax({
            type: 'POST',
            url: 'game_backend.php',
            data: {
                i: i,
                j: j
            },
            success: function(response) {
                GetAjax();
            },
            error: function() {
                console.log('Si è verificato un errore durante la chiamata AJAX (Post)');
            }
        });
    }
    </script>
</body>
</html>

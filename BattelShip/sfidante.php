<?php
require_once 'class/SqlConnection.php';
$nickname = $_POST['nickname'];
session_start();
$id=$_SESSION['id'];
$db= new SqlConnection('127.0.0.1', 'root', null, 'battagliaNavalePacchiotti');
$db->connect();
$db->query("UPDATE partita SET nicknameSfidante = '$nickname', turno = 0 WHERE ID_Partita = '$id'");
$_SESSION['nickname'] = $nickname;
$db->query("INSERT INTO giocatori (nickname) VALUES ('$nickname')");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>PlaceShip</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <h1>Posiziona le tue barche</h1>
    <div id="board">

    </div>
    <br>
    <div>
        <input type="radio" name="Incrociatore1" value="incrociatore"><img src="img/4.png" alt="4">(Incrociatore)
        <input type="radio" name="Sottomarino1" value="sottomarino"><img src="img/3.png" alt="3">(Sottomarino 1)
        <input type="radio" name="Sottomarino2" value="sottomarino"><img src="img/3.png" alt="3">(Sottomarino 2)
        <input type="radio" name="Cacciatorpediniere1" value="cacciatorpediniere"><img src="img/2.png"
            alt="2">(Cacciatorpediniere 1)
        <input type="radio" name="Cacciatorpediniere2" value="cacciatorpediniere"><img src="img/2.png"
            alt="2">(Cacciatorpediniere 2)
        <input type="radio" name="Cacciatorpediniere3" value="cacciatorpediniere"><img src="img/2.png"
            alt="2">(Cacciatorpediniere 3)
    </div>

    <br>
    <button id="ruotaBarche">Ruota le barche</button>
    <button id="posizionaBarche">Posiziona le barche</button>

    <script>
    var tabella = [];
    var barca = [];
    //composizione della tabella:[[$x,$y,$orientamento,$boat_type]=barca[]]

    function generateGrid() {
        var table = $('<table>').addClass('blu');
        for (var i = 0; i < 10; i++) {
            var row = $('<tr>');
            for (var j = 0; j < 10; j++) {
                (function(x, y) {
                    var cell = $('<td>').on('click', function() {
                        barca = [];
                        var coordinates = x + ',' + y;
                        console.log('Hai cliccato sulla cella: ' + coordinates);
                        barca.push(x, y);
                    });
                    row.append(cell);
                })(i, j);
            }
            table.append(row);
        }
        $('#board').append(table);
    }

    var orientamento = 'orizzontale';
    $('#ruotaBarche').on('click', function() {
        if (orientamento == 'orizzontale') {
            orientamento = 'verticale';
        } else {
            orientamento = 'orizzontale';
        }
        console.log(orientamento);
    }); //ruota le barche

    //prende il tipo di barca selezionata
    let radioButtons = document.querySelectorAll('input[type="radio"]');
    var tipo_barca = '';

    radioButtons.forEach(function(radio) {
        radio.addEventListener('change', function() {
            if (this.checked) {

                tipo_barca = this.value;
                console.log(tipo_barca);

            }
        });
    });

    var boat_placed = 6;

    // Chiamata AJAX
    $('#posizionaBarche').on('click', function() {
        if (boat_placed == 0) {
            JSON.stringify(tabella);

            $.ajax({
                type: 'POST',
                url: '../placeShip.php',
                data: {
                    tabella: tabella
                },
                success: function(response) {
                    alert('Barche posizionate con successo!');
                    window.location.replace(<?php echo "'game.php?id={$_SESSION['id']}'";?>);

                },
                error: function() {
                    alert('Si è verificato un errore durante il posizionamento delle barche.');
                }
            });
        } else {
            barca.push(orientamento, tipo_barca);
            console.log(barca);
            tabella.push(barca);
            barca = [];
            alert('barca posizionata!');
            boat_placed--;
        }

    });

    $(document).ready(function() {
        generateGrid();
    });
    </script>
    DEBUG: <a href=<?php echo "'game.php?id={$_SESSION['id']}'";?>>ignora posizionamento</a>
</body>

</html>


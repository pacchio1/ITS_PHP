<?php ?>
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
        <input type="radio" name="Incrociatore1" value="Incrociatore1"><img src="img/4.png" alt="4">(Incrociatore)
        <input type="radio" name="Sottomarino1" value="Sottomarino1"><img src="img/3.png" alt="3">(Sottomarino 1)
        <input type="radio" name="Sottomarino2" value="Sottomarino2"><img src="img/3.png" alt="3">(Sottomarino 2)
        <input type="radio" name="Cacciatorpediniere1" value="Cacciatorpediniere1"><img src="img/2.png"
            alt="2">(Cacciatorpediniere 1)
        <input type="radio" name="Cacciatorpediniere2" value="Cacciatorpediniere2"><img src="img/2.png"
            alt="2">(Cacciatorpediniere 2)
        <input type="radio" name="Cacciatorpediniere3" value="Cacciatorpediniere3"><img src="img/2.png"
            alt="2">(Cacciatorpediniere 3)
    </div>

    <br>
    <button id="ruotaBarche">Ruota le barche</button>
    <button id="posizionaBarche">Posiziona le barche</button>

    <script>
    function generateGrid() {
        var table = $('<table>').addClass('blu');
        for (var i = 0; i < 10; i++) {
            var row = $('<tr>');
            for (var j = 0; j < 10; j++) {
                (function(x, y) {
                    var cell = $('<td>').on('click', function() {
                        var coordinates = x + ',' + y;
                        console.log('Hai cliccato sulla cella: ' + coordinates);
                    });
                    row.append(cell);
                })(i, j);
            }
            table.append(row);
        }
        $('#board').append(table);
    }

    $('#ruotaBarche').on('click', function() {

    }); //ruota le barche

    //TODO: trasformare posiziona barche in posiziona barca e alla 6 fare la chiamata ajax
    // Chiamata AJAX
    $('#posizionaBarche').on('click', function() {
        var tabella = []; // TODO: inserire la configurazione della griglia con le barche posizionate
        $.ajax({
            type: 'POST',
            url: '../placeShip.php',
            data: {
                tabella: tabella
            },
            success: function(response) {
                alert('Barche posizionate con successo!');

            },
            error: function() {
                alert('Si è verificato un errore durante il posizionamento delle barche.');
            }
        });
    });


    $(document).ready(function() {
        generateGrid();
    });
    </script>
</body>

</html>

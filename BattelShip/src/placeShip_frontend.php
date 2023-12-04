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
    <table class="blu" id="tabellone">
        <?php for ($i = 0; $i < 10; $i++) { ?>
        <tr>
            <?php for ($j = 0; $j < 10; $j++) { ?>
            <td id="<?php echo ($i . '_' . $j) ?>"
            onclick="shoot(<?php echo ($i . ',' . $j) ?>)"></td>
            <?php } ?>
        </tr>
        <?php } ?>
    </table>
    <!-- <div id="board">
    </div> -->
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
    var campo=[[0,0,0,0,0,0,0,0,0,0],
            [0,0,0,0,0,0,0,0,0,0],
            [0,0,0,0,0,0,0,0,0,0],
            [0,0,0,0,0,0,0,0,0,0],
            [0,0,0,0,0,0,0,0,0,0],
            [0,0,0,0,0,0,0,0,0,0],
            [0,0,0,0,0,0,0,0,0,0],
            [0,0,0,0,0,0,0,0,0,0],
            [0,0,0,0,0,0,0,0,0,0],
            [0,0,0,0,0,0,0,0,0,0]];
    function shoot(i,j) {
        barca = [];
                        var coordinates = i + ',' + j;
                        console.log('Hai cliccato sulla cella: ' + coordinates);
                        barca.push(i, j);
    }


   /*  function generateGrid() {
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
                if(campo[i][j]==1){
                    cell.addClass('occupate');
                }
            }
            table.append(row);
        }
        $('#board').append(table);
    } */

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

                    window.location.replace("lobby.php");

                },
                error: function() {
                    alert('Si è verificato un errore durante il posizionamento delle barche.');
                }
            });
        } else {
            barca.push(orientamento, tipo_barca);
            console.log(barca);
            tabella.push(barca);
            var lungo=0;
            if(orientamento=='verticale'){

                if(tipo_barca=='incrociatore'){
                    var x=barca[0];
                    var y=barca[1];
                    if(x+3>=10){
                        alert("barca fuori dal tabellone")
                        window.location.replace("/html/nickname.html");
                    }
                    var tdElement = document.getElementById(x + "_" + y);
                    tdElement.setAttribute("class", "selected");
                    var tdElement = document.getElementById((x+1) + "_" + y);
                    tdElement.setAttribute("class", "selected");
                    var tdElement = document.getElementById((x+2) + "_" + y);
                    tdElement.setAttribute("class", "selected");
                    var tdElement = document.getElementById((x+3) + "_" + y);
                    tdElement.setAttribute("class", "selected");
                }
                else if(tipo_barca=='sottomarino'){
                    var x=barca[0];
                    var y=barca[1];
                    if(x+2>=10){
                        alert("barca fuori dal tabellone")
                        window.location.replace("/html/nickname.html");
                    }
                    var tdElement = document.getElementById(x + "_" + y);
                    tdElement.setAttribute("class", "selected");
                    var tdElement = document.getElementById((x+1) + "_" + y);
                    tdElement.setAttribute("class", "selected");
                    var tdElement = document.getElementById((x+2) + "_" + y);
                    tdElement.setAttribute("class", "selected");
                }
                else if(tipo_barca=='cacciatorpediniere'){
                    var y=barca[1];
                    var x=barca[0];
                    if(x+1>=10){
                        alert("barca fuori dal tabellone")
                        window.location.replace("/html/nickname.html");
                    }
                    var tdElement = document.getElementById(x + "_" + y);
                    tdElement.setAttribute("class", "selected");
                    var tdElement = document.getElementById((x+1) + "_" + y);
                    tdElement.setAttribute("class", "selected");
                }
            }else if(orientamento=='orizzontale'){
                if(tipo_barca=='incrociatore'){
                    var x=barca[0];
                    var y=barca[1];
                    if(y+3>=10){
                        alert("barca fuori dal tabellone")
                        window.location.replace("/html/nickname.html");
                    }
                    var tdElement = document.getElementById(x + "_" + y);
                    tdElement.setAttribute("class", "selected");
                    var tdElement = document.getElementById((x) + "_" + (y+1));
                    tdElement.setAttribute("class", "selected");
                    var tdElement = document.getElementById((x) + "_" + (y+2));
                    tdElement.setAttribute("class", "selected");
                    var tdElement = document.getElementById((x) + "_" + (y+3));
                    tdElement.setAttribute("class", "selected");
                }
                else if(tipo_barca=='sottomarino'){
                    var x=barca[0];
                    var y=barca[1];
                    if(y+2>=10){
                        alert("barca fuori dal tabellone")
                        window.location.replace("/html/nickname.html");
                    }
                    var tdElement = document.getElementById(x + "_" + y);
                    tdElement.setAttribute("class", "selected");
                    var tdElement = document.getElementById((x) + "_" + (y+1));
                    tdElement.setAttribute("class", "selected");
                    var tdElement = document.getElementById((x) + "_" + (y+2));
                    tdElement.setAttribute("class", "selected");
                }
                else if(tipo_barca=='cacciatorpediniere'){
                    var x=barca[0];
                    var y=barca[1];
                    if(y+1>=10){
                        alert("barca fuori dal tabellone")
                        window.location.replace("/html/nickname.html");
                    }
                    var tdElement = document.getElementById(x + "_" + y);
                    tdElement.setAttribute("class", "selected");
                    var tdElement = document.getElementById((x) + "_" + (y+1));
                    tdElement.setAttribute("class", "selected");
                }
            }
            barca[0]
            barca = [];
            alert('barca posizionata!');
            boat_placed--;
        }

    });

    /* $(document).ready(function() {
        generateGrid();
    }); */
    </script>
    DEBUG: <a href="lobby.php">ignora posizionamento</a>
</body>

</html>

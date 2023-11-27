var turno = 0;
var sfidante_div = document.getElementById("sfidante");
var stato_div = document.getElementById("stato_div");
var stato = "";

var mossa = document.getElementById("mossa");
var tabellone = document.getElementById("tabellone");
tabellone.setAttribute("class", "waiting");

var sfidante="";//da php

function GetAjax() {
    // get per ottenere se ha finito l' avversario
    $.ajax({
        type: 'GET',
        url: 'game_backend.php',
        data: {
            turno: turno,
            risultato: stato
        },
        success: function(response) {
            console.log("1 ciclo e stato fatto");
            setTimeout(GetAjax, 3000); // Ritarda la prossima chiamata di 2 secondi
            var sfidante = <?php echo isset($_GET['sfidante']) ? '"'.$_GET['sfidante'] . '"' : '""'; ?>;
        },
        error: function() {
            console.log('Si è verificato un errore durante la chiamata AJAX(get)');
        }
    });
}
function shoot(i, j) {
    var coordinates = {i,j};
    var tdElement = document.getElementById(i + "_" + j);
    tdElement.removeAttribute("onclick");
    tdElement.setAttribute("class", "selected");
    console.log("sparato a: " + i + " " + j);
    $.ajax({
        type: 'POST',
        url: 'game_backend.php',
        data: {
            coordinates: coordinates,
            id: id,
            turno: turno,

        },
        success: function(response) {
            //TODO: far capire utente se ha colpito o meno
            mossa.innerText=coordinates.i + "," + coordinates.j;
            sfidante_div.innerText=sfidante
            stato_div.innerText=stato
            GetAjax();
        },
        error: function() {
            console.log('Si è verificato un errore durante la chiamata AJAX (Post)');
        }
    });
}

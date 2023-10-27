var xhr = new XMLHttpRequest();
var url = "server-side.php";
var parametri = "?parametro1=valore1&parametro2=valore2";
xhr.open('GET', url + parametri);
// questa funzione verrà chiamata al cambio di stato della chiamata AJAX
xhr.onreadystatechange = function () {
    var DONE = 4; // stato 4 indica che la richiesta è stata effettuata.
    var OK = 200; // se la HTTP response ha stato 200 vuol dire che ha avuto successo.
    if (xhr.readyState === DONE) {
        if (xhr.status === OK) {
            console.log(xhr.responseText); // Questo è il corpo della risposta HTTP
        } else {
            console.log('Error: ' + xhr.status); // Lo stato della HTTP response.
        }
    }
};
// Invia la richiesta a server-side.php
xhr.send(null);

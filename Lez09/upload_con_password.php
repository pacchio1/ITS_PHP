<?php
var_dump($_FILES, $_POST, __DIR__);

if ($_POST["password"] != "supersegreto") {
    http_response_code(401);
    echo '<h1>Password errata</h1>';
    exit();
}
if (!isset($_FILES['file']['error'])) {
    http_response_code(401);
    echo '<h1>Non è stato inviato nessun file</h1>';
    exit();
}
if ($_FILES['file']['error'] != UPLOAD_ERR_OK) {
    http_response_code(401);
    echo '<h1>Il file inviato non è valido</h1>';
    exit();
}

$path = __DIR__ . "/upload/" . $_FILES['file']['name'];
if (!move_uploaded_file($_FILES['file']['tmp_name'], $path)) {
    http_response_code(500);
    echo '<h1>Errore durante la scrittura del file</h1>';
    exit();
} else {
    move_uploaded_file($_FILES['file']['tmp_name'], $path);
    echo '<h1>Inviata con successo</h1>';
}

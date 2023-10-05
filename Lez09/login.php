<?php
if (strlen($_POST["password"]) < 8) {
    http_response_code(400);
    echo "password too short";
} elseif (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) === false) {
    http_response_code(400);
    echo "email not valid";
} else {
    http_response_code(200);
    echo "OK";
}
var_dump($_POST);

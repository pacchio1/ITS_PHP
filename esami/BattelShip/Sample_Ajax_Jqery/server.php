<?php

use Nyholm\Psr7\Factory\Psr17Factory;
use Nyholm\Psr7Server\ServerRequestCreator;

require 'vendor/autoload.php';

// Crea una richiesta HTTP PSR-7
$factory = new Psr17Factory;
$request = (new ServerRequestCreator($factory, $factory, $factory, $factory))->fromGlobals();

// Imposto la risposta nel formato JSON
header('Content-Type: application/json');

if (!in_array($request->getMethod(), ['POST'])) {
    http_response_code(405);
    exit();
}

// Dati provenienti dal POST
$input = $request->getBody()->getContents();

try {
    $json = json_decode($input, true, 512, JSON_THROW_ON_ERROR);
} catch (JsonException $e) {
    http_response_code(400);
    echo json_encode(['error' => $e->getMessage()]);
    exit;
}

// Elaboro i dati inviati tramite $json
// es. in questo caso restituisco semplicemente il JSON in input
$result = ['result' => $json];

try {
    $response = json_encode($result, JSON_THROW_ON_ERROR);
    header(sprintf('Content-Length: %d', strlen($response)));
    echo $response;
} catch (JsonException $e) {
    http_response_code(500);
    echo json_encode(['error' => $e->getMessage()]);
    exit;
}
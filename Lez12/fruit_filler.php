<?php
$dsn = 'mysql:dbname=php_lezione;host=127.0.0.1';
$user = 'root';
try {
    $pdo = new PDO($dsn, $user);
} catch (PDOException $e) {
    printf("Connection failed: %s \n", $e->getMessage());
    exit(1);
}
$nomi = ["mela", "pera", "banana", "arancia", "melone"];
$colori = ["rosso", "verde", "giallo", "arancione", "marrone"];
/*
for ($i = 0; $i < 100; $i++) {
    $nome = $nomi[random_int(0, 4)];
    $colore = $colori[random_int(0, 4)];
    $calorie = random_int(50, 500);
    $sql = "INSERT INTO fruit (nome, colore, calorie) VALUES (:nome, :colore, :calorie)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
    $stmt->bindParam(':colore', $colore, PDO::PARAM_STR);
    $stmt->bindParam(':calorie', $calorie, PDO::PARAM_INT);
    $stmt->execute();
}
*/

$sql = "select * from fruit where colore = :colore and calorie BETWEEN :calorie_min  AND :calorie_max;";
$stmt = $pdo->prepare($sql);
$colore = "rosso";
$calorie_min = 100;
$calorie_max = 400;
$stmt->bindParam(':colore', $colore, PDO::PARAM_STR);
$stmt->bindParam(':calorie_min', $calorie_min, PDO::PARAM_INT);
$stmt->bindParam(':calorie_max', $calorie_max, PDO::PARAM_INT);
$stmt->execute();

$fruits = $stmt->fetchAll(PDO::FETCH_ASSOC);
var_dump($fruits);

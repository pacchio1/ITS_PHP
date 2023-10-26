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

$sql = "select * from fruit where colore = :colore and calorie BETWEEN :caloriemin  AND :caloriemax;";
$stmt = $pdo->prepare($sql);
$colore = "rosso";
$caloriemin = 100;
$caloriemax = 400;
$stmt->bindParam(':colore', $colore, PDO::PARAM_STR);
$stmt->bindParam(':caloriemin', $caloriemin, PDO::PARAM_INT);
$stmt->bindParam(':caloriemax', $caloriemax, PDO::PARAM_INT);
$stmt->execute();

$fruits = $stmt->fetchAll(PDO::FETCH_ASSOC);
var_dump($fruits);

<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");

$data = json_decode(file_get_contents('php://input'), true);
require 'pdo.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

$stateRead = $pdo->prepare('SELECT Pseudo, email, dateDeNaissance, Ville FROM user WHERE idUser= :idUser');
$stateRead->bindValue(':idUser', $data);
$stateRead->execute();
$result = $stateRead-> fetch();
}

exit(json_encode($result));
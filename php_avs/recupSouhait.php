<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");

$data = json_decode(file_get_contents('php://input'), true);
require 'pdo.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

$stateRead = $pdo->prepare('SELECT titre, categorie, descriptif FROM souhait WHERE idSouhait= :idSouhait');
$stateRead->bindValue(':idSouhait', $data);
$stateRead->execute();
$result = $stateRead-> fetch();
}

exit(json_encode($result));
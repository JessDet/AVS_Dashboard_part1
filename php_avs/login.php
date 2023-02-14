<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");

$data = json_decode(file_get_contents('php://input'), true);

require 'pdo.php';



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stateInsert = $pdo->prepare('SELECT * FROM admin WHERE pseudo=:pseudo AND password=:password');
    $stateInsert->bindValue(':pseudo', $data['pseudo']);
    $stateInsert->bindValue(':password', $data['password']);
    $stateInsert->execute();
    $result = $stateInsert->fetch();
    exit(json_encode($result));
}


?>
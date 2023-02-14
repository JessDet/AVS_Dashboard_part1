<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");

$data = json_decode(file_get_contents('php://input'), true);
require 'pdo.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    $stateUpdate = $pdo->prepare('
    UPDATE user
    SET
    Pseudo=:Pseudo,
    email=:email,
    dateDeNaissance=:dateDeNaissance,
    Ville=:Ville
    WHERE idUser=:idUser
    ');

    $stateUpdate->bindValue(':idUser', $data['idUser']);
    $stateUpdate->bindValue(':Pseudo', $data['Pseudo']);
    $stateUpdate->bindValue(':email', $data['email']);
    $stateUpdate->bindValue(':dateDeNaissance', $data['dateDeNaissance']);
    $stateUpdate->bindValue(':Ville', $data['Ville']);
    $stateUpdate->execute();
}

exit(json_encode($data));

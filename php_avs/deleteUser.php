<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");

$data = json_decode(file_get_contents('php://input'), true);
require 'pdo.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $stateDelete1= $pdo -> prepare('DELETE FROM commentaire WHERE idUser = :idUser');
    $stateDelete1->bindValue (':idUser', $data['idUser']);
    $stateDelete1->execute();

    $stateDelete2= $pdo -> prepare('DELETE FROM message WHERE idUser = :idUser');
    $stateDelete2->bindValue (':idUser', $data['idUser']);
    $stateDelete2->execute();

    $stateDelete3= $pdo -> prepare('DELETE FROM souhait WHERE idUser = :idUser');
    $stateDelete3->bindValue (':idUser', $data['idUser']);
    $stateDelete3->execute();

    $stateDelete= $pdo -> prepare('DELETE FROM user WHERE idUser = :idUser');
    $stateDelete->bindValue (':idUser', $data['idUser']);
    $stateDelete->execute();
}
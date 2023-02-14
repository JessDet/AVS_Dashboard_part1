<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");

$data = json_decode(file_get_contents('php://input'), true);
require 'pdo.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    $stateUpdate = $pdo->prepare('
    UPDATE souhait
    SET
    titre=:titre,
    categorie=:categorie,
    descriptif=:descriptif
    WHERE idSouhait=:idSouhait
    ');

    $stateUpdate->bindValue(':idSouhait', $data['idSouhait']);
    $stateUpdate->bindValue(':titre', $data['titre']);
    $stateUpdate->bindValue(':categorie', $data['categorie']);
    $stateUpdate->bindValue(':descriptif', $data['descriptif']);
    $stateUpdate->execute();
}

exit(json_encode($data));

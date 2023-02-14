<?php
try{
    // $pdo = new PDO('mysql:host=db5010386026.hosting-data.io;dbname=dbs8799687', 'dbu2509829', 'Iono82Dj', [
    $pdo = new PDO('mysql:host=localhost;dbname=avs', 'root', '', [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
} catch(PDOException $e) {
    echo $e->getMessage();
}
?>
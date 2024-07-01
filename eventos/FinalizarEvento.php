<?php

try {
    $idEvento = $_POST['idEvento'];
    include("../database/connection.php");

    $sqlUpdate = "UPDATE eventos SET status = 'F' WHERE id = :id_evento";
    $statement = $pdo->prepare($sqlUpdate);
    $statement->bindParam(":id_evento", $idEvento);
    $statement->execute();
    //$pdo->commit();
} catch (Exception $e) {
    echo 'Exceção capturada: ',  $e->getMessage(), "\n";
}

?>
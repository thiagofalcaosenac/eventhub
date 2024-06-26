<?php

class AtualizarAvaliacaoMedia {

    public static function atualizarPorEspaco($idEspaco) {
        try {
            include("../database/connection.php");

            $totAvaliacoes = $pdo->query('select count(*) from avaliacao where id_espaco = ' . $idEspaco)->fetchColumn(); 
            $totClassificacao = $pdo->query('select sum(classificacao) from avaliacao where id_espaco = ' . $idEspaco)->fetchColumn(); 
            $avaliacaoMedia = $totClassificacao / $totAvaliacoes;

            $sqlUpdate = "UPDATE espacos SET avaliacaoMedia = :avaliacao_media WHERE id = :id_espaco";
            $statement = $pdo->prepare($sqlUpdate);
            $statement->bindParam(":avaliacao_media", $avaliacaoMedia);
            $statement->bindParam(":id_espaco", $idEspaco);
            $statement->execute();
            //$pdo->commit();
        } catch (Exception $e) {
            echo 'Exceção capturada: ',  $e->getMessage(), "\n";
        }
    }

}

?>
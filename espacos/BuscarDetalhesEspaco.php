<?php
    try {
        include("../database/connection.php");
        $idEspaco = $_GET['idEspaco'];
        
        $stmt = $pdo->prepare('SELECT capacidade,endereco,preco,comodidades,avaliacaoMedia FROM espacos where id=? LIMIT 1');
        $stmt->execute([$idEspaco]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $htmlCapacidade = "<h3>Capacidade:</h3><h5><div style='color:black'>" . $row["capacidade"] . "</div></h5><br>";
        $htmlEndereco = "<h3>Endereço:</h3><h5><div style='color:black'>" . $row["endereco"] . "</div></h5><br>";
        $htmlPreco = "<h3>Preço:</h3><h5><div style='color:black'>" . $row["preco"] . "</div></h5><br>";
        $htmlComodidades = "<h3>Comodidades:</h3><h5><div style='color:black'>" . $row["comodidades"] . "</div></h5><br>";
        $htmlAvaliacaoMedia = "<h3>Avaliação Média:</h3><h5><div style='color:black'>" . $row["avaliacaoMedia"] . "</div></h5>";
        $html = $htmlCapacidade . $htmlEndereco . $htmlPreco . $htmlComodidades . $htmlAvaliacaoMedia;

        print($html);
    } catch (Exception $e) {
        echo 'Exceção capturada: ',  $e->getMessage(), "\n";
    }

?>
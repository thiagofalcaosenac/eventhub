<?php
    // Calcular o preço total do evento conforme a quantidade de diárias e baseado no preço para alugar o espaço.
    // Após selecionar o Espaço, pegar a Data/Hora Final - Data/Hora Inicial = Total Diárias, 
    // após isso multiplicar o preço do espaço pelo total de diárias e colocar o valor no campo Preço Total.

    try {
        include("../database/connection.php");
        $idEspaco = $_GET['idEspaco'];

        // $espacoDetalhado = $pdo->query('select endereco from espacos where id = ' . $idEspaco)->fetch();
        // print $espacoDetalhado;

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
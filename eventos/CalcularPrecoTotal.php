<?php
    // Calcular o preço total do evento conforme a quantidade de diárias e baseado no preço para alugar o espaço.
    // Após selecionar o Espaço, pegar a Data/Hora Final - Data/Hora Inicial = Total Diárias, 
    // após isso multiplicar o preço do espaço pelo total de diárias e colocar o valor no campo Preço Total.

    try {
        include("../database/connection.php");
        $idEspaco = $_POST['idEspaco'];
        $dataHoraInicial = $_POST['dataHoraInicial'];
        $dataHoraFinal = $_POST['dataHoraFinal'];

        $precoDiaria = $pdo->query('select preco from espacos where id = ' . $idEspaco)->fetchColumn();
        
        $earlier = new DateTime($dataHoraInicial);
        $later = new DateTime($dataHoraFinal);
        $dias = $later->diff($earlier)->format("%a");

        if ($dias > 0) {
            print $dias * $precoDiaria;
        } else {
            print $precoDiaria;
        }
    } catch (Exception $e) {
        echo 'Exceção capturada: ',  $e->getMessage(), "\n";
    }

?>
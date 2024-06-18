<?php

// verifica se os campos foram preenchidos e se o formulário foi enviado
if (isset($_POST['nome']) && 
    isset($_POST['email']) && 
    isset($_POST['senha']) &&
    isset($_POST['telefone']) && 
    isset($_POST['endereco']) &&
    isset($_POST['tipo'])
    ) {

    // inclui o arquivo de conexão com o banco de dados
    include("../config/connection.php");

    // recebe os valores do formulário em variáveis locais
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $telefone = $_POST['telefone'];
    $endereco = $_POST['endereco'];
    $tipo = $_POST['tipo'];
    
    // cria a query de inserção no banco de dados
    $sql = "INSERT INTO usuario (nome,email,senha,telefone,endereco,tipo) VALUES (:nome,:email,:senha,:telefone,:endereco,:tipo)";
    // prepara a query para ser executada
    $pdo = $pdo->prepare($sql);

    // substitui os parâmetros da query
    $pdo->bindParam(":nome", $nome);
    $pdo->bindParam(":email", $email);
    $pdo->bindParam(":senha", $senha);
    $pdo->bindParam(":telefone", $telefone);
    $pdo->bindParam(":endereco", $endereco);
    $pdo->bindParam(":tipo", $tipo);

    // executa a query
    $pdo->execute();
    // verifica se a query foi executada com sucesso

    if ($pdo->rowCount() == 1) {
        echo("Usuario inserido com sucesso!");
        // header("Location: list_disciplina.php");
    } else {
        echo("Erro ao inserir disciplina!");
    }
}

?>
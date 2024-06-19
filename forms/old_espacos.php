<?php

echo('CHEGOU AQUI111?')

// verifica se os campos foram preenchidos e se o formulário foi enviado
if (isset($_POST['nome']) && 
    isset($_POST['descricao']) && 
    isset($_POST['capacidade']) &&
    isset($_POST['endereco']) && 
    isset($_POST['preco']) &&
    isset($_POST['comodidades']))
    ) {

    echo('CHEGOU AQUI?')

    // inclui o arquivo de conexão com o banco de dados
    include("../config/connection.php");

    // recebe os valores do formulário em variáveis locais
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $capacidade = $_POST['capacidade'];
    $endereco = $_POST['endereco'];
    $preco = $_POST['preco'];
    $comodidades = $_POST['comodidades'];

    // cria a query de inserção no banco de dados
    $sql = "INSERT INTO espacos (nome,descricao,capacidade,endereco,preco,comodidades) VALUES (:nome,:descricao,:capacidade,:endereco,:preco,:comodidades)";
    // prepara a query para ser executada
    $pdo = $pdo->prepare($sql);

    // substitui os parâmetros da query
    $pdo->bindParam(":nome", $nome);
    $pdo->bindParam(":descricao", $descricao);
    $pdo->bindParam(":capacidade", $capacidade);
    $pdo->bindParam(":endereco", $endereco);
    $pdo->bindParam(":preco", $preco);
    $pdo->bindParam(":comodidades", $comodidades);

    // executa a query
    $pdo->execute();
    // verifica se a query foi executada com sucesso

    if ($pdo->rowCount() == 1) {
        echo("Espaço inserido com sucesso!");
        // header("Location: list_disciplina.php");
    } else {
        echo("Erro ao inserir espaço!");
    }
}

?>
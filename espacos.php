<?php

if (isset($_POST['nome']) && 
    isset($_POST['descricao']) && 
    isset($_POST['capacidade']) &&
    isset($_POST['endereco']) && 
    isset($_POST['preco']) &&
    isset($_POST['comodidades'])) {

    // inclui o arquivo de conexão com o banco de dados
    include("./config/connection.php");

    // recebe os valores do formulário em variáveis locais
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $capacidade = $_POST['capacidade'];
    $endereco = $_POST['endereco'];
    $preco = $_POST['preco'];
    $comodidades = $_POST['comodidades'];

    $imagem = $_FILES['foto']['tmp_name'];
    $tamanho_imagem = $_FILES['foto']['size'];
    $tipo_imagem = $_FILES['foto']['type'];
    $nome_foto = $_FILES['foto']['name'];

    if ( $imagem != "none" )
    {
      $fp = fopen($imagem, "rb");
      $conteudo = fread($fp, $tamanho_imagem);
      $conteudo = addslashes($conteudo);
      fclose($fp);
    }

    // cria a query de inserção no banco de dados
    $sql = "INSERT INTO espacos (nome,descricao,capacidade,endereco,preco,comodidades, nome_imagem, tamanho_imagem, tipo_imagem, foto) 
            VALUES (:nome,:descricao,:capacidade,:endereco,:preco,:comodidades, :nome_foto, :tamanho_imagem, :tipo_imagem, :conteudo)";
    // prepara a query para ser executada
    $pdo = $pdo->prepare($sql);

    // substitui os parâmetros da query
    $pdo->bindParam(":nome", $nome);
    $pdo->bindParam(":descricao", $descricao);
    $pdo->bindParam(":capacidade", $capacidade);
    $pdo->bindParam(":endereco", $endereco);
    $pdo->bindParam(":preco", $preco);
    $pdo->bindParam(":comodidades", $comodidades);

    $pdo->bindParam(":nome_foto", $nome_foto);
    $pdo->bindParam(":tamanho_imagem", $tamanho_imagem);
    $pdo->bindParam(":tipo_imagem", $tipo_imagem);
    $pdo->bindParam(":conteudo", $conteudo);

    // executa a query
    $pdo->execute();
    // verifica se a query foi executada com sucesso

    if ($pdo->rowCount() == 1) {
        $mensagem = "Espaço inserido com sucesso!";
        // header("Location: list_disciplina.php");
    } else {
        $mensagem = "Erro ao inserir espaço!";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>EventHub</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">
</head>

<body class="get-a-quote-page">

  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="index.html" class="logo d-flex align-items-center me-auto">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1 class="sitename">EventHub</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="index.html">Home<br></a></li>
          <li><a href="usuario.html">Usuário</a></li>
          <li class="dropdown" class="active"><a href="#"><span>Espaços</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li><a href="listar_espacos.html">Listagem</a></li>
              <li><a href="espacos.html">Cadastro</a></li>
            </ul>
          </li>
          <li><a href="eventos.html">Eventos</a></li>
          <li><a href="avaliacoes.html">Avaliações</a></li>

        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>
    </div>
  </header>

  <main class="main">

    <!-- Page Title -->
    <div class="page-title position-relative" data-aos="fade" style="background-image: url(assets/img/page-title-bg.jpg);">
      <div class="container position-relative">
        <h1 class="">Tela de Espaços</h1>
        <p>Nesta tela é possível fazer a manipulação de dados do espaço</p>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="index.html">Home</a></li>
            <li class="current">Tela de Espaços</li>
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->

    <!-- Get A Quote Section -->
    <section id="get-a-quote" class="get-a-quote section">

      <div class="container">

        <div class="row g-0" data-aos="fade-up" data-aos-delay="100">

          <div class="col-lg-5 quote-bg" style="background-image: url(assets/img/quote-bg.jpg);"></div>

          <div class="col-lg-7" data-aos="fade-up" data-aos-delay="200">
            <form method="post" enctype="multipart/form-data" data-aos="fade-up" data-aos-delay="200">
              <!-- Espaço - id(PK), nome, descricao, capacidade, endereco, preco, comodidades, avaliacaoMedia, foto, id_usuario(FK) -->

              <div class="row gy-4">

                <div class="col-lg-12">
                  <h4>Informe dados do espaço</h4>
                </div>

                <div class="col-md-12">
                  <input type="text" name="id" class="form-control" placeholder="Id" readonly hidden>
                </div>

                <div class="col-md-12">
                  <input type="text" name="nome" class="form-control" placeholder="Nome" required>
                </div>
                
                <div class="col-md-12">
                  <textarea class="form-control" name="descricao" rows="6" placeholder="Descrição" required=""></textarea>
                </div>

                <div class="col-md-12">
                  <input type="int" name="capacidade" class="form-control" placeholder="Capacidade" required>
                </div>

                <div class="col-md-12">
                  <input type="text" name="endereco" class="form-control" placeholder="Endereço" required>
                </div>

                <div class="col-md-12">
                  <input type="number" min="0.00" max="100000.00" name="preco" class="form-control" placeholder="Preço" required>
                </div>

                <div class="col-md-12">
                  <input type="int" name="comodidades" class="form-control" placeholder="Comodidades" required>
                </div>

                <div class="col-md-12">
                  <input type="file" name="foto" class="form-control" placeholder="Foto">
                </div>

                <div class="col-md-12 text-center">
                  <?php
                    echo (isset($mensagem)) ? "<div class='sent-message'>$mensagem</div>" : "";
                  ?>

                  <button type="submit">Salvar</button>
                </div>

              </div>
            </form>
          </div><!-- End Quote Form -->

        </div>

      </div>

    </section><!-- /Get A Quote Section -->

  </main>

  <footer id="footer" class="footer">

    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-5 col-md-12 footer-about">
          <a href="index.html" class="logo d-flex align-items-center">
            <span class="sitename">Marketplace para Divulgação de Espaços para Eventos</span>
          </a>
          <p>
            Um marketplace para divulgação de espaços para eventos é uma plataforma online que conecta proprietários de locais com organizadores de eventos, oferecendo maior visibilidade e ferramentas de gerenciamento para os proprietários, enquanto facilita a busca, comparação e reserva de espaços ideais para os organizadores, criando uma ponte eficiente entre oferta e demanda e beneficiando ambas as partes.            
          </p>
          <div class="social-links d-flex mt-4">
            <a href="https://twitter.com/SenacSC" target="_blank"><i class="bi bi-twitter-x"></i></a>
            <a href="https://www.facebook.com/SenacSC" target="_blank"><i class="bi bi-facebook"></i></a>
            <a href="https://www.instagram.com/senacsantacatarina/" target="_blank"><i class="bi bi-instagram"></i></a>
            <a href="https://www.linkedin.com/school/senac-sc/" target="_blank"><i class="bi bi-linkedin"></i></a>
          </div>
        </div>

        <div class="col-lg-2 col-6 footer-links">
          <h4>Links úteis</h4>
          <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">Usuário</a></li>
            <li><a href="#">Espaços</a></li>
            <li><a href="#">Eventos</a></li>
            <li><a href="#">Avaliações</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-6 footer-links">
          <h4>Nossos Serviços</h4>
          <ul>
            <li><a href="#">Divulgar Espaços</a></li>
            <li><a href="#">Realizar Eventos</a></li>
            <li><a href="#">Aplicar Avaliações</a></li>
            <li><a href="#">Gerenciar Usuário</a></li>
            <li><a href="#">Interação B2C</a></li>
          </ul>
        </div>

        <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
          <h4>Fale com a gente</h4>
          <p>R. Visc. de Taunay, 730</p>
          <p>Atiradores, Joinville</p>
          <p>Santa Catarina</p>
          <p class="mt-4"><strong>Telefone:</strong> <span>(47) 3431-6666</span></p>
          <p><strong>Email:</strong> <span>joinville@sc.senac.br</span></p>
        </div>

      </div>
    </div>

    <div class="container copyright text-center mt-4">
      <p>© <span>Copyright</span> <strong class="px-1 sitename">SENAC</strong> <span>All Rights Reserved</span></p>
      <div class="credits">
        Designed by Marketplace Team
      </div>
    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>
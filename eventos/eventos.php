<?php

try {
  require_once("../sessao/Session.php");
  Session::start();
  $idUsuario = Session::getIdUser();
  $perfil = Session::getProfileUser();

  // verifica se os campos foram preenchidos e se o formulário foi enviado
  if (isset($_POST['titulo']) && 
      isset($_POST['descricao']) && 
      isset($_POST['dataHoraInicial']) &&
      isset($_POST['dataHoraFinal']) && 
      isset($_POST['status']) &&
      isset($_POST['tipo']) && 
      isset($_POST['id_espaco'])) {

      // inclui o arquivo de conexão com o banco de dados
      include("../database/connection.php");

      // recebe os valores do formulário em variáveis locais
      $titulo = $_POST['titulo'];
      $descricao = $_POST['descricao'];
      $dataHoraInicial = $_POST['dataHoraInicial'];
      $dataHoraFinal = $_POST['dataHoraFinal'];
      $status = $_POST['status'];
      $tipo = $_POST['tipo'];
      $id_espaco = $_POST['id_espaco'];
      $precoTotal = $_POST['precoTotal'];

      // cria a query de inserção no banco de dados
      $sql = "INSERT INTO eventos (titulo,descricao,data_hora_inicial,data_hora_final,status,tipo,id_espaco,preco_total, id_usuario) 
      VALUES (:titulo,:descricao,:dataHoraInicial,:dataHoraFinal,:status,:tipo,:id_espaco,:precoTotal, :id_usuario)";
      // prepara a query para ser executada
      $pdo = $pdo->prepare($sql);

      // substitui os parâmetros da query
      $pdo->bindParam(":titulo", $titulo);
      $pdo->bindParam(":descricao", $descricao);
      $pdo->bindParam(":dataHoraInicial", $dataHoraInicial);
      $pdo->bindParam(":dataHoraFinal", $dataHoraFinal);
      $pdo->bindParam(":status", $status);
      $pdo->bindParam(":tipo", $tipo);
      $pdo->bindParam(":id_espaco", $id_espaco);
      $pdo->bindParam(":precoTotal", $precoTotal);
      $pdo->bindParam(":id_usuario", $idUsuario);
      
      // executa a query
      $pdo->execute();
      // verifica se a query foi executada com sucesso

      if ($pdo->rowCount() == 1) {
          $mensagem = "Evento inserido com sucesso!";
          header("Location: eventos.php");
      } else {
          $mensagem = "Erro ao inserir evento!";
      }
  }
} catch (Exception $e) {
  echo 'Exceção capturada: ',  $e->getMessage(), "\n";
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
  <link href="../assets/img/favicon.png" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"/>

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="../assets/css/main.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

  <script type="text/javascript">
  $(document).ready(function() {
    $("#spaceSelector").change(function() {
      $.ajax({
          data: {
            idEspaco: $("#spaceSelector").val(),
            dataHoraInicial: $("#dataHoraInicial").val(),
            dataHoraFinal: $("#dataHoraFinal").val()
          },
          url: 'CalcularPrecoTotal.php',
          type: 'POST',
          success:function(response) {
            $("#precoTotal").val(response);
          }
      });
    });


    $("#dataHoraInicial").change(function() {
      $.ajax({
          data: {
            idEspaco: $("#spaceSelector").val(),
            dataHoraInicial: $("#dataHoraInicial").val(),
            dataHoraFinal: $("#dataHoraFinal").val()
          },
          url: 'CalcularPrecoTotal.php',
          type: 'POST',
          success:function(response) {
            $("#precoTotal").val(response);
          }
      });
    });


      $("#dataHoraFinal").change(function() {
        $.ajax({
            data: {
              idEspaco: $("#spaceSelector").val(),
              dataHoraInicial: $("#dataHoraInicial").val(),
              dataHoraFinal: $("#dataHoraFinal").val()
            },
            url: 'CalcularPrecoTotal.php',
            type: 'POST',
            success:function(response) {
              $("#precoTotal").val(response);
            }
        });            
      });

      $("#spaceSelector").trigger("change");
      $("#dataHoraInicial").trigger("change");
      $("#dataHoraFinal").trigger("change");
    });
  </script>

</head>

<body class="get-a-quote-page">
  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="../index.php" class="logo d-flex align-items-center me-auto">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="../assets/img/logo.png" alt=""> -->
        <h1 class="sitename">EventHub</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="../index.php">Home<br></a></li>

          <?php
            if (isset($idUsuario)) {
              echo "<li><a href='../usuario/atualizar_usuario.php?idUsuario=" . $idUsuario . "'>Usuário</a></li>";
            }
          ?>
          
          <?php
            if ((isset($perfil) && $perfil == 'L') || (!(isset($idUsuario)))) {
              echo '<li><a href="../espacos/listar_espacos.php">Espaços</a></li>';
            } else {
              echo '<li class="dropdown"><a href="#"><span>Espaços</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>';
              echo '<ul>';
              echo '<li><a href="../espacos/listar_espacos.php">Listagem</a></li>';
              echo '<li><a href="../espacos/espacos.php">Cadastro</a></li>';
              echo '</ul>';
              echo '</li>';
            }
          ?>

          <?php
            if (isset($idUsuario)) {
              echo '<li><a class="active" href="eventos.php">Eventos</a></li>';
              echo '<li><a href="../avaliacoes/avaliacoes.php">Avaliações</a></li>';
            }
          ?>

        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>
    </div>
  </header>

  <main class="main">

    <!-- Page Title -->
    <div class="page-title position-relative" data-aos="fade" style="background-image: url(../assets/img/page-title-bg.jpg);">
      <div class="container position-relative">
        <h1 class="">Tela de Eventos</h1>
        <p>Nesta tela é possível realizar a manipulação dos dados do evento</p>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="../index.php">Home</a></li>
            <li class="current">Tela de Eventos</li>
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->

    <!-- Get A Quote Section -->
    <section id="get-a-quote" class="get-a-quote section">

      <div class="container">

        <div class="row g-0" data-aos="fade-up" data-aos-delay="100">

          <div class="col-lg-5 quote-bg" style="background-image: url(../assets/img/quote-bg.jpg);"></div>

          <div class="col-lg-7" data-aos="fade-up" data-aos-delay="200">
            <form action="" method="post" enctype="multipart/form-data" data-aos="fade-up" data-aos-delay="200" class="php-email-form">
              <!-- Evento - id(PK), titulo, descricao, dataHoraInicial, dataHoraFinal, tipo, status, precoTotal, id_usuario(FK), id_espaco(FK) -->

              <div class="row gy-4">

                <div class="col-lg-12">
                  <h4>Informe dados do evento</h4>
                </div>

                <div class="col-md-12">
                  <input type="text" name="id" class="form-control" placeholder="Id" readonly hidden>
                </div>

                <div class="col-md-12">
                  <input type="text" name="titulo" class="form-control" placeholder="Título" required>
                </div>

                <div class="col-md-12">
                  <input type="text" name="descricao" class="form-control" placeholder="Descrição" required>
                </div>

                <div class="col-md-12">
                  <input type="datetime-local" id="dataHoraInicial" name="dataHoraInicial" class="form-control" placeholder="Data/Hora Inicial" required>
                </div>

                <div class="col-md-12">
                  <input type="datetime-local" id="dataHoraFinal" name="dataHoraFinal" class="form-control" placeholder="Data/Hora Final" required>
                </div>

                <div class="col-md-12">
                  <label for="status">Status:</label>
                  <select id="status" name="status" disabled>
                    <option value="A">Aberto</option>
                    <option value="F">Finalizado</option>
                  </select>                  
                </div>
                

                <div class="col-md-12">
                  <label for="tipo">Tipo de Evento:</label>
                  <select id="tipo" name="tipo">
                    <option value="A">Aniversário</option>
                    <option value="F">Formatura</option>
                    <option value="R">Reunião</option>
                    <option value="O">Outros</option>
                  </select>                  
                </div>

                <!-- Aqui vai carregar os espaços cadastrados existentes no sistema. -->
                <div class="col-md-12">
                  <label for="spaceSelector">Espaço:</label>
                  <select id="spaceSelector" name="id_espaco">
                  <?php
                    require_once('../database/connection.php');

                    $data = $pdo->prepare('SELECT * FROM espacos');
                    $data->execute();

                    while ($row = $data->fetch()) {
                      echo "<option value='". $row['id'] ."'>" . $row['id'] . " - " . $row['descricao'] . "</option>";
                    }
                  ?>
                  </select>
                </div>

                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">R$</span>
                    </div>
                    <input type="text" class="form-control" placeholder="0.00" id="precoTotal" name="precoTotal" disabled />
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
          <a href="../index.php" class="logo d-flex align-items-center">
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
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/aos/aos.js"></script>
  <script src="../assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Main JS File -->
  <script src="../assets/js/main.js"></script>
</body>

</html>
<?php
session_start();
$idUsuario = $_SESSION['idUsuario'];
$perfil = $_SESSION['perfil'];
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
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">
</head>

<body class="get-a-quote-page">

  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="index.php" class="logo d-flex align-items-center me-auto">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1 class="sitename">EventHub</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="index.php">Home<br></a></li>

          <?php
            if (isset($idUsuario)) {
              echo "<li><a href='atualizar_usuario.php?idUsuario=" . $idUsuario . "'>Usuário</a></li>";
            }
          ?>
          
          <?php
            if ((isset($perfil) && $perfil == 'L') || (!(isset($idUsuario)))) {
              echo '<li><a class="active" href="listar_espacos.php">Espaços</a></li>';
            } else {
              echo '<li class="dropdown" class="active"><a href="#"><span>Espaços</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>';
              echo '<ul>';
              echo '<li><a href="listar_espacos.php">Listagem</a></li>';
              echo '<li><a href="espacos.php">Cadastro</a></li>';
              echo '</ul>';
              echo '</li>';
            }
          ?>

          <?php
            if (isset($idUsuario)) {
              echo '<li><a href="eventos.php">Eventos</a></li>';
              echo '<li><a href="avaliacoes.php">Avaliações</a></li>';
            }
          ?>

        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <?php
        if (!(isset($idUsuario))) {
          echo '<a class="btn-getstarted" href="login.php">Acessar</a>';
        }
      ?>

    </div>
  </header>

  <main class="main">

    <!-- Page Title -->
    <div class="page-title position-relative" data-aos="fade" style="background-image: url(assets/img/page-title-bg.jpg);">
      <div class="container position-relative">
        <h1 class="">Listagem dos Espaços</h1>
        <p>Segue abaixo a listagem de espaços disponíveis</p>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="index.php">Home</a></li>
            <li class="current">Listagem dos Espaços</li>
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->

    <!-- Services Section -->
    <section id="services" class="services section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <span class="">Espaços para Eventos<br></span>
        <h2 class="">Espaços para Eventos</h2>
        <p>Alguns dos espaços divulgados para realização de eventos!</p>
      </div><!-- End Section Title -->

      <div class="container">

        <form action="#" class="form-search d-flex align-items-stretch mb-3" data-aos="fade-up" data-aos-delay="200">
          <input type="text" class="form-control" name="filtro" id="filtro" placeholder="Informe o endereço do local desejado">
          <button type="submit" class="btn btn-primary">Buscar</button>
        </form>

        <div class="row gy-4">

        <?php           
          try {
              require_once './config/connection.php';

              $filtro = $_POST['filtro'];
              echo ($filtro);

              $data = $pdo->prepare('SELECT * FROM espacos');
              $data->execute();

              while ($row = $data->fetch()) {
                echo "<div class='col-lg-4 col-md-6' data-aos='fade-up' data-aos-delay='100'>";
                echo "<div class='card'>";
                echo "<div class='card-img'>";
                echo '<img class="img-fluid" src="data:image/jpeg;base64,'.base64_encode($row['foto']).'" />';
                echo "</div>";
                if (!(isset($idUsuario))) {
                  echo "<h3>" . $row['nome'] . "</h3>";
                } else {
                  if (isset($perfil) && $perfil == 'L') {
                    echo "<h3>" . $row['nome'] . "</h3>"; 
                  } else {
                    echo "<a href='atualizar_espaco.php?idEspaco=" . $row['id'] . "'>";
                    echo "<h3><i class='glyphicon glyphicon-edit'>" . $row['nome'] . "</i></h3>";
                    echo '</a>';
                  }
                }
                echo "<p> Descrição: " . $row['descricao'] . "</p>";
                echo "</div>";
                echo "</div>";
              }
            } catch (Exception $e) {
              echo 'Exceção capturada: ',  $e->getMessage(), "\n";
            }
        ?>

        </div>

      </div>

    </section><!-- /Services Section -->

  </main>

  <footer id="footer" class="footer">

    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-5 col-md-12 footer-about">
          <a href="index.php" class="logo d-flex align-items-center">
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
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>
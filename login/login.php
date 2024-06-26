<?php
try {
  require_once("../sessao/Session.php");
  Session::start();

  if (isset($_POST['typeEmailX']) && isset($_POST['typePasswordX'])) {
      // inclui o arquivo de conexão com o banco de dados
      include("../database/connection.php");

      // recebe os valores do formulário em variáveis locais
      $email = $_POST['typeEmailX'];
      $senha = $_POST['typePasswordX'];

      $sql = "SELECT * FROM usuario WHERE email = :email AND senha = :senha";
      $pdo = $pdo->prepare($sql);

      // substitui os parâmetros da query
      $pdo->bindParam(":email", $email);
      $pdo->bindParam(":senha", $senha);

      // executa a query
      $pdo->execute();

      if ($pdo->rowCount() == 1) {
          $usuario = $pdo->fetch();
          Session::set('eventhub', [
            'idUsuario' => $usuario['id'],
            'perfil' => $usuario['tipo'],
          ]);
          header("Location: ../index.php");
      } else {
          $mensagem = "Usuário ou senha inválidos!";
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

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="../assets/css/main.css" rel="stylesheet">
</head>

<body>

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
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>
    </div>
  </header>

  <main class="main">

    <!-- Page Title -->
    <div class="page-title position-relative" data-aos="fade" style="background-image: url(../assets/img/page-title-bg.jpg);">
      <div class="container position-relative">
        <h1 class="">Tela do Login</h1>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="../index.php">Home</a></li>
            <li class="current">Tela de Login</li>
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->

    <section class="vh-50 gradient-custom">
      <div class="container py-3 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-12 col-md-8 col-lg-6 col-xl-5">
            <div class="card bg-white text-black" style="border-radius: 1rem;">
              <div class="card-body p-5 text-center">
    
                <div class="mb-md-5 mt-md-4 pb-5">
    
                  <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                  <p class="text-black-50 mb-5">Entre com seu email e senha</p>

                  <div>
                    <p class="mb-0">
                    <?php
                    echo (isset($mensagem)) ? "<div class='sent-message'>$mensagem</div>" : "";
                    ?>
                    </p>
                  </div>

                  <form method="post" enctype="multipart/form-data" data-aos="fade-up" data-aos-delay="200" class="php-email-form">
                    <div data-mdb-input-init class="form-outline form-black mb-4">
                      <input type="email" name="typeEmailX" id="typeEmailX" class="form-control form-control-lg" required />
                      <label class="form-label" for="typeEmailX">Email</label>
                    </div>
      
                    <div data-mdb-input-init class="form-outline form-black mb-4">
                      <input type="password" name="typePasswordX" id="typePasswordX" class="form-control form-control-lg" required />
                      <label class="form-label" for="typePasswordX">Senha</label>
                    </div>
      
                    <p class="small mb-5 pb-lg-2"><a class="text-black-50" href="#" id="forgotPasswordLink">Esqueceu a senha?</a></p>
      
                    <button data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-dark btn-lg px-5" type="submit">Login</button>
                  </form>
                </div>
    
                <div class="col-md-12 text-center">

                <div>
                  <p class="mb-0">Não tem uma conta? <a href="../usuario/usuario.php" class="text-black-50 fw-bold">Registre-se!</a>
                  </p>
                </div>
    
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

  </main>

  <footer id="footer" class="footer">

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


  <script>
    document.getElementById('forgotPasswordLink').addEventListener('click', function(event) {
        event.preventDefault();
        const email = document.getElementById('typeEmailX').value;
        if (email) {
            window.location.href = `./recuperar_senha.php?email=${encodeURIComponent(email)}`;
        } else {
            window.location.href = `./recuperar_senha.php`;
        }
    });
  </script>
</body>

</html>
<?php
  require_once("./Session.php");

  if (Session::isSessionActive()) {
    echo 'chegou aqui </br>';
    echo 'Id do Usuário na Sessão: ' . Session::getIdUser() . '</br>';

    if (Session::getProfileUser() == 'T') {
      echo 'Perfil do Usuário na Sessão: ' . Session::getProfileUser() . ' = LOCATÁRIO';
    }

    if (Session::getProfileUser() == 'L') {
      echo 'Perfil do Usuário na Sessão: ' . Session::getProfileUser() . ' = LOCADOR';
    }    
  } else {
    header("Location: ../login/login.php");
  }
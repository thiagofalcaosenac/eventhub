<?php
  require_once("./Session.php");

  if (Session::isSessionActive()) {
    echo 'chegou aqui </br>';
    echo Session::getIdUser();    
  } else {
    header("Location: login.php");
  }
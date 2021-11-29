<?php
  session_start();
  unset($_SESSION['id']);
  unset($_SESSION['nome']);
  unset($_SESSION['email']);
  unset($_SESSION['cartas']);
  unset($_SESSION['erro']);

  header("Location: ../index.php");
?>
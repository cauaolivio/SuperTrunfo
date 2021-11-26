<?php
  $servername = "";
  $database = "";
  $username = "";
  $password = "";

  $conn = mysqli_connect($servername, $username, $password, $database);

  if (!$conn) {
    die("A conexão falhou! " . mysqli_connect_error());
  }
?>
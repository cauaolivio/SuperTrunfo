<?php
  include_once "connection.php";

  session_start();
  $id = $_GET['id'];

  $qry = "DELETE FROM carta_usuario WHERE id = $id";
 
  if (mysqli_query($conn, $qry)) {
    mysqli_close($conn);
    header("Location: ../pages/yourCards.php");
  } else {
    echo "<p>Erro: ". $qry ." | ". mysqli_error($conn) ."</p>";
    mysqli_close($conn);
  }
?>
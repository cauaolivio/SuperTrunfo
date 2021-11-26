<?php
  session_start();
  include_once "connection.php";
  include_once "../class/card.php";

  if(isset($_POST['nome']) && isset($_POST['url']) && isset($_POST['potencia'])
    && isset($_POST['motor']) && isset($_POST['velMax']) 
    && isset($_POST['tempZeroCem']) && isset($_POST['peso'])
  ){
    $id = $_POST['id'];
    $name = $_POST['nome'];
    $motor = $_POST['motor'];
    $time = $_POST['tempZeroCem'];
    $url = $_POST['url'];
    $potency = $_POST['potencia'];
    $maxSpeed = $_POST['velMax'];
    $weight = $_POST['peso'];
    $idUser = $_SESSION['id'];

    $sql = "UPDATE carta_usuario SET nome = '$name', imagem = '$url', potencia = $potency, motor = $motor, velocidade_maxima = $maxSpeed, tempo_zero_cem = $time, peso = $weight WHERE id = $id";

    if(mysqli_query($conn, $sql)){
      $card = new Carta($name, $url, $potency, $motor, $maxSpeed, $time, $weight);
      mysqli_close($conn);
      header("Location: ../pages/yourCards.php");
    }else {
      echo "<script type='javascript'>alert('Erro". $sql ." | ". mysqli_error($conn) ."')";
      mysqli_close($conn);
    }
  }

?>

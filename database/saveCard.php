<?php
  session_start();
  include_once "connection.php";
  include_once "../class/card.php";

  if(isset($_POST['nome']) && isset($_POST['url']) && isset($_POST['potencia'])
    && isset($_POST['motor']) && isset($_POST['velMax']) 
    && isset($_POST['tempZeroCem']) && isset($_POST['peso'])
  ){
    $name = $_POST['nome'];
    $motor = $_POST['motor'];
    $time = $_POST['tempZeroCem'];
    $url = $_POST['url'];
    $potency = $_POST['potencia'];
    $maxSpeed = $_POST['velMax'];
    $weight = $_POST['peso'];
    $idUser = $_SESSION['id'];

    $sql = "INSERT INTO carta_usuario(id_usuario, nome, imagem, potencia, motor, velocidade_maxima, tempo_zero_cem, peso) VALUES($idUser, '$name', '$url', $potency, $motor, $maxSpeed, $time, $weight)";
  
    if(mysqli_query($conn, $sql)){
      $card = new Carta($name, $url, $potency, $motor, $maxSpeed, $time, $weight);
      mysqli_close($conn);
      header("Location: ../pages/createCard.php");
    }else {
      echo "<script type='javascript'>alert('Erro". $sql ." | ". mysqli_error($conn) ."')";
      mysqli_close($conn);
    }
  }
?>
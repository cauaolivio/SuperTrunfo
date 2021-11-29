<?php
  session_start();
  include_once "connection.php";
  include_once "../class/card.php";

  if(isset($_POST['nome']) && !empty($_POST['nome']) && isset($_POST['url']) 
    && !empty($_POST['url']) && isset($_POST['potencia']) && !empty($_POST['potencia']) 
    && isset($_POST['motor']) &&!empty($_POST['motor']) && isset($_POST['velMax']) 
    && !empty($_POST['velMax']) && isset($_POST['tempZeroCem']) && !empty($_POST['tempZeroCem']) 
    && isset($_POST['peso']) && !empty($_POST['peso'])
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
      unset($_SESSION['erro']);
      $card = new Carta($name, $url, $potency, $motor, $maxSpeed, $time, $weight);
      mysqli_close($conn);
      header("Location: ../pages/createCard.php");
    }else {
      echo "<script type='javascript'>alert('Erro". $sql ." | ". mysqli_error($conn) ."')";
      mysqli_close($conn);
    }
  } else {
    $_SESSION['erro'] = "Preencha todos os campos abaixo";

    mysqli_close($conn);
    header("Location: ../pages/createCard.php");
  }
?>